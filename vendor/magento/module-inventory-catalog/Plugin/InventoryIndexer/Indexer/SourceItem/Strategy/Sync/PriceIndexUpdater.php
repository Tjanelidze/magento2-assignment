<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryCatalog\Plugin\InventoryIndexer\Indexer\SourceItem\Strategy\Sync;

use Magento\Catalog\Model\Indexer\Product\Price\Processor;
use Magento\InventoryIndexer\Indexer\SourceItem\Strategy\Sync;
use Magento\InventoryIndexer\Model\ResourceModel\GetProductIdsBySourceItemIds;

/**
 * Reindex price after source item has reindexed.
 */
class PriceIndexUpdater
{
    /**
     * @var Processor
     */
    private $priceIndexProcessor;

    /**
     * @var GetProductIdsBySourceItemIds
     */
    private $productIdsBySourceItemIds;

    /**
     * @param Processor $priceIndexProcessor
     * @param GetProductIdsBySourceItemIds $productIdsBySourceItemIds
     */
    public function __construct(
        Processor $priceIndexProcessor,
        GetProductIdsBySourceItemIds $productIdsBySourceItemIds
    ) {
        $this->priceIndexProcessor = $priceIndexProcessor;
        $this->productIdsBySourceItemIds = $productIdsBySourceItemIds;
    }

    /**
     * Reindex product prices.
     *
     * @param Sync $subject
     * @param void $result
     * @param array $sourceItemIds
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function afterExecuteList(
        Sync $subject,
        $result,
        array $sourceItemIds
    ): void {
        $productIds = $this->productIdsBySourceItemIds->execute($sourceItemIds);
        if (!empty($productIds)) {
            $this->priceIndexProcessor->reindexList($productIds);
        }
    }
}
