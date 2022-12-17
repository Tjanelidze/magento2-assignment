<?php
/**
 * @copyright  Vertex. All rights reserved.  https://www.vertexinc.com/
 * @author     Mediotype                     https://www.mediotype.com/
 */

namespace Vertex\Tax\Model\FlexField\Processor;

use Exception;
use Magento\Customer\Api\Data\AddressInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Sales\Api\Data\CreditmemoItemInterface;
use Magento\Sales\Api\Data\InvoiceItemInterface;
use Magento\Sales\Api\Data\OrderItemInterface;
use Magento\Sales\Api\OrderItemRepositoryInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Tax\Api\Data\QuoteDetailsItemInterface;
use Vertex\Tax\Model\FlexField\Extractor\AttributeExtractor;
use Vertex\Tax\Model\FlexField\Extractor\EavAttributeExtractor;
use Vertex\Tax\Model\FlexField\Extractor\EavValueExtractor;
use Vertex\Tax\Model\FlexField\FlexFieldProcessableAttribute;

/**
 * @inheritDoc
 */
class BillingAddressGetterProcessor implements
    InvoiceFlexFieldProcessorInterface,
    TaxCalculationFlexFieldProcessorInterface
{
    /** @var string[] */
    const BLACK_LIST = [
        'getExtensionAttributes',
        'getCustomAttribute',
        'getCustomAttributes',
        'getVatId',
        'getCreatedAt',
        'getUpdatedAt',
        'getTelephone',
        'getFax',
        'getPrefix',
        'getSuffix',
        'getId',
        'getRegionId',
        'getCustomerId'
    ];

    /** @var string */
    const PREFIX = 'billing_address';

    /** @var AttributeExtractor */
    private $attributeExtractor;

    /** @var AttributeRenamer */
    private $attributeRenamer;

    /** @var CartRepositoryInterface */
    private $cartRepository;

    /** @var EavAttributeExtractor */
    private $eavAttributeExtractor;

    /** @var OrderItemRepositoryInterface */
    private $orderItemRepository;

    /** @var OrderRepositoryInterface */
    private $orderRepository;

    /** @var EavValueExtractor */
    private $valueExtractor;

    /**
     * @param AttributeExtractor $attributeExtractor
     * @param EavAttributeExtractor $eavAttributeExtractor
     * @param EavValueExtractor $valueExtractor
     * @param CartRepositoryInterface $cartRepository
     * @param OrderRepositoryInterface $orderRepository
     * @param OrderItemRepositoryInterface $orderItemRepository
     * @param AttributeRenamer $attributeRenamer
     */
    public function __construct(
        AttributeExtractor $attributeExtractor,
        EavAttributeExtractor $eavAttributeExtractor,
        EavValueExtractor $valueExtractor,
        CartRepositoryInterface $cartRepository,
        OrderRepositoryInterface $orderRepository,
        OrderItemRepositoryInterface $orderItemRepository,
        AttributeRenamer $attributeRenamer
    ) {
        $this->attributeExtractor = $attributeExtractor;
        $this->eavAttributeExtractor = $eavAttributeExtractor;
        $this->valueExtractor = $valueExtractor;
        $this->cartRepository = $cartRepository;
        $this->orderItemRepository = $orderItemRepository;
        $this->orderRepository = $orderRepository;
        $this->attributeRenamer = $attributeRenamer;
    }

    /**
     * @inheritdoc
     */
    public function getAttributes()
    {
        $optionGroup = 'Billing Address';

        /** @var FlexFieldProcessableAttribute[] $results */
        return $this->attributeRenamer->execute(
            array_merge(
                $this->attributeExtractor->extract(
                    AddressInterface::class,
                    static::PREFIX,
                    $optionGroup,
                    static::class,
                    static::BLACK_LIST
                ),
                $this->eavAttributeExtractor->extract(
                    'customer_address',
                    static::PREFIX,
                    $optionGroup,
                    static::class
                )
            ),
            [
                static::PREFIX . '.getFirstname' => __('First Name'),
                static::PREFIX . '.getLastname' => __('Last Name'),
                static::PREFIX . '.getMiddlename' => __('Middle Name'),
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getValueFromCreditmemo(
        CreditmemoItemInterface $item,
        $attributeCode,
        $fieldType = null,
        $fieldId = null
    ) {
        try {
            $orderItem = $this->orderItemRepository->get($item->getOrderItemId());
        } catch (NoSuchEntityException $e) {
            return null;
        }

        return $this->getValueFromOrderId($orderItem->getOrderId(), $attributeCode);
    }

    /**
     * {@inheritdoc}
     */
    public function getValueFromInvoice(InvoiceItemInterface $item, $attributeCode, $fieldType = null, $fieldId = null)
    {
        try {
            $orderItem = $this->orderItemRepository->get($item->getOrderItemId());
        } catch (NoSuchEntityException $e) {
            return null;
        }

        return $this->getValueFromOrderId($orderItem->getOrderId(), $attributeCode);
    }

    /**
     * {@inheritdoc}
     */
    public function getValueFromOrder(OrderItemInterface $item, $attributeCode, $fieldType = null, $fieldId = null)
    {
        return $this->getValueFromOrderId($item->getOrderId(), $attributeCode);
    }

    /**
     * {@inheritdoc}
     */
    public function getValueFromQuote(
        QuoteDetailsItemInterface $item,
        $attributeCode,
        $fieldType = null,
        $fieldId = null
    ) {
        $extAttributes = $item->getExtensionAttributes();
        if (!$extAttributes || !$extAttributes->getQuoteId()) {
            return null;
        }

        try {
            // Extract billing address from quote
            $cart = $this->cartRepository->get($extAttributes->getQuoteId());
            $address = $cart->getBillingAddress();

            if ($address === null) {
                return null;
            }

            if ($attributeCode === static::PREFIX . '.getStreet') {
                return implode(', ', $address->getStreet());
            }

            return $this->valueExtractor->extract(
                $address,
                'customer_address',
                $attributeCode,
                static::PREFIX,
                $this->getCustomDateAttributes()
            );
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Retrieve a list of custom date attribute codes
     *
     * @return array
     */
    private function getCustomDateAttributes()
    {
        return $this->eavAttributeExtractor->getCustomDateAttributeCodes('customer_address');
    }

    /**
     * Extract the value of a getter given a Order ID and attribute code
     *
     * @param int $orderId
     * @param string $attributeCode
     * @return int|string|null
     */
    private function getValueFromOrderId($orderId, $attributeCode)
    {
        try {
            $order = $this->orderRepository->get($orderId);
            $address = $order->getBillingAddress();

            if ($address === null) {
                return null;
            }

            if ($attributeCode === static::PREFIX . '.getStreet') {
                return implode(', ', $address->getStreet());
            }

            return $this->valueExtractor->extract(
                $address,
                'customer_address',
                $attributeCode,
                static::PREFIX,
                $this->getCustomDateAttributes()
            );
        } catch (Exception $e) {
            return null;
        }
    }

}
