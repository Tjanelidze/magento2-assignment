<?php
/**
 * @copyright  Vertex. All rights reserved.  https://www.vertexinc.com/
 * @author     Mediotype                     https://www.mediotype.com/
 */

namespace Vertex\Tax\Model\Api\Data\InvoiceRequestBuilder;

use Magento\Framework\Stdlib\StringUtils;
use Magento\Sales\Api\Data\OrderExtensionInterface;
use Magento\Sales\Api\Data\OrderInterface;
use Magento\Sales\Api\Data\ShippingAssignmentInterface;
use Magento\Sales\Api\Data\ShippingInterface;
use Magento\Sales\Api\Data\TotalInterface;
use Magento\Sales\Api\OrderRepositoryInterfaceFactory;
use Vertex\Data\LineItemInterface;
use Vertex\Data\LineItemInterfaceFactory;
use Vertex\Exception\ConfigurationException;
use Vertex\Tax\Model\Api\Utility\MapperFactoryProxy;
use Vertex\Tax\Model\Config;
use Vertex\Tax\Model\Repository\TaxClassNameRepository;

/**
 * Processes shipping data for Invoices and Creditmemos
 */
class ShippingProcessor
{
    /** @var TaxClassNameRepository */
    private $classNameRepository;

    /** @var Config */
    private $config;

    /** @var LineItemInterfaceFactory */
    private $lineItemFactory;

    /** @var OrderRepositoryInterfaceFactory */
    private $orderRepositoryFactory;

    /** @var StringUtils */
    private $stringUtilities;

    /** @var MapperFactoryProxy */
    private $mapperFactory;

    /**
     * @param OrderRepositoryInterfaceFactory $orderRepository
     * @param Config $config
     * @param TaxClassNameRepository $classNameRepository
     * @param LineItemInterfaceFactory $lineItemFactory
     * @param StringUtils $stringUtils
     * @param MapperFactoryProxy $mapperProxy
     */
    public function __construct(
        OrderRepositoryInterfaceFactory $orderRepositoryFactory,
        Config $config,
        TaxClassNameRepository $classNameRepository,
        LineItemInterfaceFactory $lineItemFactory,
        StringUtils $stringUtils,
        MapperFactoryProxy $mapperProxy
    ) {
        $this->orderRepositoryFactory = $orderRepositoryFactory;
        $this->config = $config;
        $this->classNameRepository = $classNameRepository;
        $this->lineItemFactory = $lineItemFactory;
        $this->stringUtilities = $stringUtils;
        $this->mapperFactory = $mapperProxy;
    }

    /**
     * Retrieve line items for the shipping methods invoiced or credited against an Order
     *
     * In Magento, an Invoice does not know which shipping methods it is charging
     * to the customer, only that it is - in fact - charging the customer some
     * amount of shipping.  Magento core tax does not care, as there is only one
     * tax class for all shipping methods - however, in an environment like
     * Vertex, each shipping method can theoretically have it's own tax.  This
     * matters in Magento, because each Order can theoretically have multiple
     * shipping methods.
     *
     * Thus, we invoice each shipment the percentage it was of the total cost.
     *
     * This will work in the vast majority of use-cases, but can be incorrect
     * if there are large tax differences between shipping methods and an order
     * is never fully invoiced.
     *
     * @param int $orderId
     * @param float $totalShipmentCost
     * @return LineItemInterface[]
     * @throws ConfigurationException
     */
    public function getShippingLineItems($orderId, $totalShipmentCost)
    {
        // We use a factory here to bypass the registry so we can load stuff like shipping assignments on placement
        $order = $this->orderRepositoryFactory->create()->get($orderId);
        $extensionAttributes = $order->getExtensionAttributes();

        if ($extensionAttributes === null || !$extensionAttributes instanceof OrderExtensionInterface) {
            return [];
        }

        /** @var ShippingAssignmentInterface[]|null $shippingAssignments */
        $shippingAssignments = $extensionAttributes->getShippingAssignments();

        if ($shippingAssignments === null) {
            return [];
        }

        /** @var float $orderAmount The total cost of shipping on the order */
        $orderAmount = 0;

        /** @var float[string] $shippingCosts Cost of each shipping method, indexed by identifier */
        $shippingCosts = [];

        foreach ($shippingAssignments as $shippingAssignment) {
            // This just gathers those variables
            $shipping = $shippingAssignment->getShipping();
            if ($shipping === null || !$shipping instanceof ShippingInterface) {
                continue;
            }

            $total = $shipping->getTotal();
            if ($total === null || !$total instanceof TotalInterface) {
                continue;
            }

            $cost = $total->getBaseShippingAmount() - $total->getBaseShippingDiscountAmount();

            $orderAmount += $cost;
            $shippingCosts[$shipping->getMethod()] = $cost;
        }

        return $this->buildLineItems($totalShipmentCost, $shippingCosts, $orderAmount, $order);
    }

    /**
     * Create LineItems by calculating the value based on the total costs
     *
     * @param float $totalShipmentCost
     * @param float[] $shippingCosts Cost of each shipping method indexed by identifier
     * @param float $orderAmount
     * @param OrderInterface $order
     * @return array
     * @throws ConfigurationException
     */
    private function buildLineItems($totalShipmentCost, $shippingCosts, $orderAmount, $order)
    {
        $storeCode = $order->getStoreId();
        $lineItemMapper = $this->mapperFactory->getForClass(LineItemInterface::class, $storeCode);

        // Pre-fetch the shipping tax class since all shipment types have the same one
        $taxClassId = $this->config->getShippingTaxClassId($order->getStoreId());
        $productClass = $this->classNameRepository->getById($taxClassId);

        $lineItems = [];

        foreach ($shippingCosts as $method => $cost) {
            $percentage = (float)$orderAmount === 0.0 ? 0 : $cost / $orderAmount; // as a decimal
            $invoicedCost = round($totalShipmentCost * $percentage, 2);

            /** @var LineItemInterface $lineItem */
            $lineItem = $this->lineItemFactory->create();
            $lineItem->setProductCode(
                $this->stringUtilities->substr($method, 0, $lineItemMapper->getProductCodeMaxLength())
            );
            $lineItem->setProductClass(
                $this->stringUtilities->substr($productClass, 0, $lineItemMapper->getProductTaxClassNameMaxLength())
            );
            $lineItem->setUnitPrice($invoicedCost);
            $lineItem->setQuantity(1);
            $lineItem->setExtendedPrice($invoicedCost);
            $lineItems[] = $lineItem;
        }
        return $lineItems;
    }
}
