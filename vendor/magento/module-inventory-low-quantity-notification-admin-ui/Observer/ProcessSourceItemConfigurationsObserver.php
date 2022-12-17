<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryLowQuantityNotificationAdminUi\Observer;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Controller\Adminhtml\Product\Save;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\InputException;
use Magento\InventoryApi\Api\Data\SourceItemInterface;
use Magento\InventoryCatalogApi\Api\DefaultSourceProviderInterface;
use Magento\InventoryCatalogApi\Model\IsSingleSourceModeInterface;
use Magento\InventoryConfigurationApi\Api\Data\StockItemConfigurationInterface;
use Magento\InventoryConfigurationApi\Model\IsSourceItemManagementAllowedForProductTypeInterface;
use Magento\InventoryLowQuantityNotification\Model\SourceItemsConfigurationProcessor;

/**
 * Save source relations (configuration) during product persistence via controller
 *
 * This needs to be handled in dedicated observer, because there is no pre-defined way of making several API calls for
 * Form submission handling
 */
class ProcessSourceItemConfigurationsObserver implements ObserverInterface
{
    /**
     * @var IsSourceItemManagementAllowedForProductTypeInterface
     */
    private $isSourceItemManagementAllowedForProductType;

    /**
     * @var SourceItemsConfigurationProcessor
     */
    private $sourceItemsConfigurationProcessor;

    /**
     * @var IsSingleSourceModeInterface
     */
    private $isSingleSourceMode;

    /**
     * @var DefaultSourceProviderInterface
     */
    private $defaultSourceProvider;

    /**
     * @param IsSourceItemManagementAllowedForProductTypeInterface $isSourceItemManagementAllowedForProductType
     * @param SourceItemsConfigurationProcessor $sourceItemsConfigurationProcessor
     * @param IsSingleSourceModeInterface $isSingleSourceMode
     * @param DefaultSourceProviderInterface $defaultSourceProvider
     */
    public function __construct(
        IsSourceItemManagementAllowedForProductTypeInterface $isSourceItemManagementAllowedForProductType,
        SourceItemsConfigurationProcessor $sourceItemsConfigurationProcessor,
        IsSingleSourceModeInterface $isSingleSourceMode,
        DefaultSourceProviderInterface $defaultSourceProvider
    ) {
        $this->isSourceItemManagementAllowedForProductType = $isSourceItemManagementAllowedForProductType;
        $this->sourceItemsConfigurationProcessor = $sourceItemsConfigurationProcessor;
        $this->isSingleSourceMode = $isSingleSourceMode;
        $this->defaultSourceProvider = $defaultSourceProvider;
    }

    /**
     * Process source items configuration after product has been saved via admin ui.
     *
     * @param EventObserver $observer
     * @return void
     * @throws InputException
     */
    public function execute(EventObserver $observer)
    {
        /** @var ProductInterface $product */
        $product = $observer->getEvent()->getProduct();
        if ($this->isSourceItemManagementAllowedForProductType->execute($product->getTypeId()) === false) {
            return;
        }

        /** @var Save $controller */
        $controller = $observer->getEvent()->getController();

        $assignedSources = [];
        if ($this->isSingleSourceMode->execute()) {
            $stockData = $controller->getRequest()->getParam('product', [])['stock_data'] ?? [];
            $notifyStockQty = $stockData[StockItemConfigurationInterface::NOTIFY_STOCK_QTY] ?? 0;
            $notifyStockQtyUseDefault = $stockData[StockItemConfigurationInterface::USE_CONFIG_NOTIFY_STOCK_QTY] ?? 1;
            $assignedSources[] = [
                SourceItemInterface::SOURCE_CODE => $this->defaultSourceProvider->getCode(),
                StockItemConfigurationInterface::NOTIFY_STOCK_QTY => $notifyStockQty,
                'notify_stock_qty_use_default' => $notifyStockQtyUseDefault,
            ];
        } else {
            $sources = $controller->getRequest()->getParam('sources', []);
            $stockData = $controller->getRequest()->getParam('product', [])['stock_data'] ?? [];
            $assignedSources =
                isset($sources['assigned_sources'])
                && is_array($sources['assigned_sources'])
                    ? $this->updateAssignedSources($sources['assigned_sources'], $stockData)
                    : [];
        }

        $this->sourceItemsConfigurationProcessor->process($product->getSku(), $assignedSources);
    }

    /**
     * Update assign source item quantity, status notify_stock_qty and notify_stock_qty_use_default
     *
     * @param array $assignedSources
     * @param array $stockData
     * @return array
     */
    private function updateAssignedSources(array $assignedSources, array $stockData): array
    {
        foreach ($assignedSources as $key => $source) {
            if (!key_exists('quantity', $source) && isset($source['qty'])) {
                $assignedSources[$key]['quantity'] = (int) $source['qty'];
            }
            if (!key_exists('status', $source) && isset($source['source_status'])) {
                $assignedSources[$key]['source_status']= (int) $source['source_status'];
            }
            if ($source['notify_stock_qty'] == null) {
                $assignedSources[$key]['notify_stock_qty'] =
                    $stockData[StockItemConfigurationInterface::NOTIFY_STOCK_QTY] ?? 0;
            }
            if ($source['notify_stock_qty_use_default'] == null) {
                $assignedSources[$key]['notify_stock_qty_use_default'] =
                    $stockData[StockItemConfigurationInterface::USE_CONFIG_NOTIFY_STOCK_QTY] ?? 1;
            }
        }
        return $assignedSources;
    }
}
