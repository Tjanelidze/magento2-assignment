<?php
/**
 * @copyright  Vertex. All rights reserved.  https://www.vertexinc.com/
 * @author     Mediotype                     https://www.mediotype.com/
 */

namespace Vertex\Tax\Model\Plugin;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\Api\SearchCriteriaBuilderFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Api\Data\ShippingAssignmentInterface;
use Magento\Quote\Model\Quote\Address;
use Magento\Quote\Model\Quote\Item\AbstractItem;
use Magento\Tax\Api\Data\QuoteDetailsItemInterface;
use Magento\Tax\Api\Data\QuoteDetailsItemInterfaceFactory;
use Magento\Tax\Api\Data\TaxClassKeyInterface;
use Magento\Tax\Model\Sales\Total\Quote\CommonTaxCollector;
use Vertex\Tax\Model\Api\Utility\IsVirtualLineItemDeterminer;
use Vertex\Tax\Model\Config;
use Vertex\Tax\Model\Repository\TaxClassNameRepository;

/**
 * Plugins to the Common Tax Collector
 */
class CommonTaxCollectorPlugin
{
    /** @var Config */
    private $config;

    /** @var SearchCriteriaBuilderFactory */
    private $criteriaBuilderFactory;

    /** @var ProductRepositoryInterface */
    private $productRepository;

    /** @var TaxClassNameRepository */
    private $taxClassNameRepository;

    /** @var IsVirtualLineItemDeterminer */
    private $virtualLineDeterminer;

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param SearchCriteriaBuilderFactory $criteriaBuilderFactory
     * @param TaxClassNameRepository $taxClassNameRepository
     * @param IsVirtualLineItemDeterminer $virtualLineDeterminer
     * @param Config $config
     */
    public function __construct(
        ProductRepositoryInterface $productRepository,
        SearchCriteriaBuilderFactory $criteriaBuilderFactory,
        TaxClassNameRepository $taxClassNameRepository,
        IsVirtualLineItemDeterminer $virtualLineDeterminer,
        Config $config
    ) {
        $this->config = $config;
        $this->productRepository = $productRepository;
        $this->criteriaBuilderFactory = $criteriaBuilderFactory;
        $this->taxClassNameRepository = $taxClassNameRepository;
        $this->virtualLineDeterminer = $virtualLineDeterminer;
    }

    /**
     * Fetch and store the tax class of the child of any configurable products mapped
     *
     * Steps we take:
     * 1. Reduce the items to process from all items to those that are configurable products
     * 2. Retrieve an array of those items SKUs - due to the nature of configurable products, they will be the
     *    simple's sku
     * 3. Fetch all products for items we want to process
     * 4. Create a mapping of product sku -> tax class id
     * 5. Fetch all tax class names
     * 6. Go through the product sku mapping and override the tax class ids on the parent products' items
     *
     * @param CommonTaxCollector $subject
     * @param QuoteDetailsItemInterface[] $items
     * @return QuoteDetailsItemInterface[]
     */
    public function afterMapItems(CommonTaxCollector $subject, array $items)
    {
        // Manually providing the store ID is not necessary
        if (!$this->config->isVertexActive()) {
            return $items;
        }

        $result = array_reduce(
            $items,
            static function ($result, QuoteDetailsItemInterface $item) {
                if ($item->getExtensionAttributes() && $item->getExtensionAttributes()->getVertexIsConfigurable()) {
                    $code = strtoupper($item->getExtensionAttributes()->getVertexProductCode());
                    $result['processItems'][$code] = $item;
                    $result['productCodes'][] = $code;
                }
                return $result;
            },
            ['processItems' => [], 'productCodes' => []]
        );

        /** @var QuoteDetailsItemInterface[] $processItems indexed by product sku */
        $processItems = $result['processItems'];

        /** @var string[] $productCodes List of SKUs we want to know the tax classes of */
        $productCodes = $result['productCodes'];

        /** @var SearchCriteriaBuilder $criteriaBuilder */
        $criteriaBuilder = $this->criteriaBuilderFactory->create();
        $criteriaBuilder->addFilter(ProductInterface::SKU, $productCodes, 'in');
        $criteria = $criteriaBuilder->create();
        $products = $this->productRepository->getList($criteria)->getItems();

        /** @var int[] $productCodeTaxClassMap Mapping of product sku (key) to tax class IDs */
        $productCodeTaxClassMap = [];

        /** @var ProductInterface[] $products */
        foreach ($products as $product) {
            $attribute = $product->getCustomAttribute('tax_class_id');
            $taxClassId = $attribute ? $attribute->getValue() : null;
            $productCodeTaxClassMap[strtoupper($product->getSku())] = $taxClassId;
        }

        /** @var int[] $taxClassIds */
        $taxClassIds = array_values($productCodeTaxClassMap);
        $taxClasses = $this->taxClassNameRepository->getListByIds($taxClassIds);

        foreach ($productCodeTaxClassMap as $productCode => $taxClassId) {
            $processItems[$productCode]->setTaxClassId($taxClasses[$taxClassId]);
            $processItems[$productCode]->getTaxClassKey()->setValue($taxClassId);
        }

        return $items;
    }

    /**
     * Add a created SKU for shipping to the QuoteDetailsItem
     *
     * @param CommonTaxCollector $subject
     * @param callable $super
     * @param ShippingAssignmentInterface $shippingAssignment
     * @param \Magento\Quote\Model\Quote\Address\Total $total
     * @param bool $useBaseCurrency
     * @return QuoteDetailsItemInterface
     */
    public function aroundGetShippingDataObject(
        CommonTaxCollector $subject,
        callable $super,
        ShippingAssignmentInterface $shippingAssignment,
        $total,
        $useBaseCurrency
    ) {
        // Allows forward compatibility with argument additions
        $arguments = func_get_args();
        array_splice($arguments, 0, 2);

        /** @var QuoteDetailsItemInterface[] $quoteItems */
        $itemDataObject = call_user_func_array($super, $arguments);

        $store = $this->getStoreCodeFromShippingAssignment($shippingAssignment);
        if ($itemDataObject === null
            || !$this->config->isVertexActive($store) || !$this->config->isTaxCalculationEnabled($store)) {
            return $itemDataObject;
        }

        $shipping = $shippingAssignment->getShipping();
        if ($shipping === null) {
            return $itemDataObject;
        }

        if ($shipping->getMethod() === null && $total->getShippingTaxCalculationAmount() == 0) {
            // If there's no method and a $0 price then there's no need for an empty shipping tax item
            return null;
        }

        $extensionAttributes = $itemDataObject->getExtensionAttributes();
        $extensionAttributes->setVertexProductCode($shippingAssignment->getShipping()->getMethod());

        return $itemDataObject;
    }

    /**
     * Add VAT ID to Address used in Tax Calculation
     *
     * @param CommonTaxCollector $subject
     * @param callable $super
     * @param Address $address
     * @return AddressInterface
     * @see CommonTaxCollector::mapAddress()
     */
    public function aroundMapAddress(
        CommonTaxCollector $subject,
        callable $super,
        Address $address
    ) {
        $arguments = func_get_args();
        array_splice($arguments, 0, 2);

        /** @var AddressInterface $customerAddress */
        $customerAddress = call_user_func_array($super, $arguments);

        $customerAddress->setVatId($address->getVatId());

        return $customerAddress;
    }

    /**
     * Add Vertex data to QuoteDetailsItems
     *
     * @param CommonTaxCollector $subject
     * @param callable $super
     * @param QuoteDetailsItemInterfaceFactory $dataObjectFactory
     * @param AbstractItem $item
     * @param bool $priceIncludesTax
     * @param bool $useBaseCurrency
     * @param string|null $parentCode
     * @return QuoteDetailsItemInterface
     * @see CommonTaxCollector::mapItem()
     */
    public function aroundMapItem(
        CommonTaxCollector $subject,
        callable $super,
        $dataObjectFactory,
        AbstractItem $item,
        $priceIncludesTax,
        $useBaseCurrency,
        $parentCode = null
    ) {
        // Allows forward compatibility with argument additions
        $arguments = func_get_args();
        array_splice($arguments, 0, 2);

        /** @var QuoteDetailsItemInterface $taxData */
        $taxData = call_user_func_array($super, $arguments);

        if ($this->config->isVertexActive($item->getStoreId())) {
            $extensionData = $taxData->getExtensionAttributes();
            try {
                $product = $this->productRepository->get($item->getProduct()->getSku());
                $commodityCode = $product->getExtensionAttributes()->getVertexCommodityCode();
                if ($commodityCode) {
                    $extensionData->setVertexCommodityCode($commodityCode);
                }
            } catch (NoSuchEntityException $e) { // phpcs:ignore Magento2.CodeAnalysis.EmptyBlock.DetectedCatch
                /* Fake product, Exception expected, NOOP for commodity code lookup */
            }
            $extensionData->setVertexProductCode($item->getProduct()->getSku());
            $extensionData->setVertexIsConfigurable($item->getProduct()->getTypeId() === 'configurable');
            $extensionData->setStoreId($item->getStore()->getStoreId());
            $extensionData->setProductId($item->getProduct()->getId());
            $extensionData->setQuoteItemId($item->getId());
            $extensionData->setCustomerId($item->getQuote()->getCustomerId());
            $extensionData->setIsVirtual($this->virtualLineDeterminer->isCartItemVirtual($item));

            if ($quote = $item->getQuote()) {
                $extensionData->setQuoteId($quote->getId());
                $extensionData->setCustomerId($quote->getCustomerId());
            }
        }

        return $taxData;
    }

    /**
     * Add a created SKU and update the tax class of Item-level Giftwrap
     *
     * @param CommonTaxCollector $subject
     * @param callable $super
     * @param QuoteDetailsItemInterfaceFactory $dataObjectFactory
     * @param AbstractItem $item
     * @param $priceIncludesTax
     * @param $useBaseCurrency
     * @return QuoteDetailsItemInterface[]
     */
    public function aroundMapItemExtraTaxables(
        CommonTaxCollector $subject,
        callable $super,
        $dataObjectFactory,
        AbstractItem $item,
        $priceIncludesTax,
        $useBaseCurrency
    ) {
        // Allows forward compatibility with argument additions
        $arguments = func_get_args();
        array_splice($arguments, 0, 2);

        /** @var QuoteDetailsItemInterface[] $quoteItems */
        $quoteItems = call_user_func_array($super, $arguments);

        $store = $item->getStore();

        if (!$this->config->isVertexActive($store->getStoreId())) {
            return $quoteItems;
        }

        foreach ($quoteItems as $quoteItem) {
            if ($quoteItem->getType() !== 'item_gw') {
                continue;
            }
            $productSku = $item->getProduct()->getSku();
            $taxClassId = $this->config->getGiftWrappingItemClass($store);
            $gwPrefix = $this->config->getGiftWrappingItemCodePrefix($store);

            // Set the Product Code
            $extensionData = $quoteItem->getExtensionAttributes();
            $extensionData->setVertexProductCode($gwPrefix . $productSku);

            // Change the Tax Class ID
            $quoteItem->setTaxClassId($taxClassId);
            $taxClassKey = $quoteItem->getTaxClassKey();
            if ($taxClassKey && $taxClassKey->getType() === TaxClassKeyInterface::TYPE_ID) {
                $quoteItem->getTaxClassKey()->setValue($taxClassId);
            }
        }

        return $quoteItems;
    }

    /**
     * Retrieve the Store ID from a Shipping Assignment
     *
     * This is the same way the Magento_Tax module gets the store when its needed - we have a problem, though, where
     * getQuote isn't part of the AddressInterface, and I don't particularly trust all the getters to not unexpectedly
     * return NULL.
     *
     * @param ShippingAssignmentInterface|null $shippingAssignment
     * @return string|null
     */
    private function getStoreCodeFromShippingAssignment(ShippingAssignmentInterface $shippingAssignment = null)
    {
        return $shippingAssignment !== null
        && $shippingAssignment->getShipping() !== null
        && $shippingAssignment->getShipping()->getAddress() !== null
        && method_exists($shippingAssignment->getShipping()->getAddress(), 'getQuote')
        && $shippingAssignment->getShipping()->getAddress()->getQuote() !== null
            ? $shippingAssignment->getShipping()->getAddress()->getQuote()->getStoreId()
            : null;
    }
}
