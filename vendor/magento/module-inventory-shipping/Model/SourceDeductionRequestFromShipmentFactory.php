<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryShipping\Model;

use Magento\InventorySourceDeductionApi\Model\SourceDeductionRequestInterface;
use Magento\Sales\Model\Order\Shipment;
use Magento\InventorySalesApi\Api\Data\SalesEventInterface;
use Magento\InventorySalesApi\Api\Data\SalesEventInterfaceFactory;
use Magento\InventorySalesApi\Api\Data\SalesChannelInterfaceFactory;
use Magento\InventorySalesApi\Api\Data\SalesChannelInterface;
use Magento\InventorySalesApi\Api\Data\SalesEventExtensionFactory;
use Magento\InventorySalesApi\Api\Data\SalesEventExtensionInterface;
use Magento\InventorySourceDeductionApi\Model\SourceDeductionRequestInterfaceFactory;
use Magento\Store\Api\WebsiteRepositoryInterface;

/**
 * Factory for source deduction request
 */
class SourceDeductionRequestFromShipmentFactory
{
    /**
     * @var SourceDeductionRequestInterfaceFactory
     */
    private $sourceDeductionRequestFactory;

    /**
     * @var SalesChannelInterfaceFactory
     */
    private $salesChannelFactory;

    /**
     * @var SalesEventInterfaceFactory
     */
    private $salesEventFactory;

    /**
     * @var WebsiteRepositoryInterface
     */
    private $websiteRepository;

    /**
     * @var SalesEventExtensionFactory;
     */
    private $salesEventExtensionFactory;

    /**
     * @param SourceDeductionRequestInterfaceFactory $sourceDeductionRequestFactory
     * @param SalesChannelInterfaceFactory $salesChannelFactory
     * @param SalesEventInterfaceFactory $salesEventFactory
     * @param WebsiteRepositoryInterface $websiteRepository
     * @param SalesEventExtensionFactory $salesEventExtensionFactory
     */
    public function __construct(
        SourceDeductionRequestInterfaceFactory $sourceDeductionRequestFactory,
        SalesChannelInterfaceFactory $salesChannelFactory,
        SalesEventInterfaceFactory $salesEventFactory,
        WebsiteRepositoryInterface $websiteRepository,
        SalesEventExtensionFactory $salesEventExtensionFactory
    ) {
        $this->sourceDeductionRequestFactory = $sourceDeductionRequestFactory;
        $this->salesChannelFactory = $salesChannelFactory;
        $this->salesEventFactory = $salesEventFactory;
        $this->websiteRepository = $websiteRepository;
        $this->salesEventExtensionFactory = $salesEventExtensionFactory;
    }

    /**
     * Get source deduction request
     *
     * @param Shipment $shipment
     * @param string $sourceCode
     * @param array $items
     * @return SourceDeductionRequestInterface
     */
    public function execute(
        Shipment $shipment,
        string $sourceCode,
        array $items
    ): SourceDeductionRequestInterface {
        $websiteId = $shipment->getOrder()->getStore()->getWebsiteId();

        /** @var SalesEventExtensionInterface */
        $salesEventExtension = $this->salesEventExtensionFactory->create([
            'data' => ['objectIncrementId' => (string)$shipment->getOrder()->getIncrementId()]
        ]);

        $salesEvent = $this->salesEventFactory->create([
            'type' => SalesEventInterface::EVENT_SHIPMENT_CREATED,
            'objectType' => SalesEventInterface::OBJECT_TYPE_ORDER,
            'objectId' => (string)$shipment->getOrderId()
        ]);
        $salesEvent->setExtensionAttributes($salesEventExtension);

        $websiteCode = $this->websiteRepository->getById($websiteId)->getCode();
        $salesChannel = $this->salesChannelFactory->create([
            'data' => [
                'type' => SalesChannelInterface::TYPE_WEBSITE,
                'code' => $websiteCode
            ]
        ]);

        return $this->sourceDeductionRequestFactory->create([
            'sourceCode' => $sourceCode,
            'items' => $items,
            'salesChannel' => $salesChannel,
            'salesEvent' => $salesEvent
        ]);
    }
}
