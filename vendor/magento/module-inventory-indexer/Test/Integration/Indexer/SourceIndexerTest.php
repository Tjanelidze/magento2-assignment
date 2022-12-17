<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryIndexer\Test\Integration\Indexer;

use Magento\InventoryIndexer\Indexer\Source\SourceIndexer;
use Magento\InventoryIndexer\Model\ResourceModel\GetStockItemData;
use Magento\InventorySalesApi\Model\GetStockItemDataInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class SourceIndexerTest extends TestCase
{
    /**
     * @var SourceIndexer
     */
    private $sourceIndexer;

    /**
     * @var GetStockItemData
     */
    private $getStockItemData;

    /**
     * @var RemoveIndexData
     */
    private $removeIndexData;

    protected function setUp(): void
    {
        $this->sourceIndexer = Bootstrap::getObjectManager()->get(SourceIndexer::class);
        $this->getStockItemData = Bootstrap::getObjectManager()->get(GetStockItemData::class);

        $this->removeIndexData = Bootstrap::getObjectManager()->get(RemoveIndexData::class);
        $this->removeIndexData->execute([10, 20, 30]);
    }

    /**
     * We broke transaction during indexation so we need to clean db state manually
     */
    protected function tearDown(): void
    {
        $this->removeIndexData->execute([10, 20, 30]);
    }

    /**
     * Source 'eu-1' is assigned on EU-stock(id:10) and Global-stock(id:30)
     * Thus these stocks stocks be reindexed
     *
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     *
     * @param string $sku
     * @param int $stockId
     * @param array|null $expectedData
     *
     * @dataProvider reindexRowDataProvider
     *
     * @magentoDbIsolation disabled
     */
    public function testReindexRow(string $sku, int $stockId, $expectedData)
    {
        $this->sourceIndexer->executeRow('eu-1');

        $stockItemData = $this->getStockItemData->execute($sku, $stockId);
        self::assertEquals($expectedData, $stockItemData);
    }

    /**
     * @return array
     */
    public function reindexRowDataProvider(): array
    {
        return [
            ['SKU-1', 10, [GetStockItemDataInterface::QUANTITY => 8.5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-1', 30, [GetStockItemDataInterface::QUANTITY => 8.5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-2', 10, null],
            ['SKU-2', 30, [GetStockItemDataInterface::QUANTITY => 5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-3', 10, [GetStockItemDataInterface::QUANTITY => 0, GetStockItemDataInterface::IS_SALABLE => 0]],
            ['SKU-3', 30, [GetStockItemDataInterface::QUANTITY => 0, GetStockItemDataInterface::IS_SALABLE => 0]],
        ];
    }

    /**
     * Source 'eu-1' and 'us-1' are assigned on EU-stock(id:10), US-stock(id:20) and Global-stock(id:30)
     * Thus these stocks should be reindexed
     *
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     *
     * @param string $sku
     * @param int $stockId
     * @param array|null $expectedData
     *
     * @dataProvider reindexListDataProvider
     *
     * @magentoDbIsolation disabled
     */
    public function testReindexList(string $sku, int $stockId, $expectedData)
    {
        $this->sourceIndexer->executeList(['eu-1', 'us-1']);

        $stockItemData = $this->getStockItemData->execute($sku, $stockId);
        self::assertEquals($expectedData, $stockItemData);
    }

    /**
     * All of stocks should be reindexed
     *
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     *
     * @param string $sku
     * @param int $stockId
     * @param array|null $expectedData
     *
     * @dataProvider reindexListDataProvider
     *
     * @magentoDbIsolation disabled
     */
    public function testReindexAll(string $sku, int $stockId, $expectedData)
    {
        $this->sourceIndexer->executeFull();

        $stockItemData = $this->getStockItemData->execute($sku, $stockId);
        self::assertEquals($expectedData, $stockItemData);
    }

    /**
     * @return array
     */
    public function reindexListDataProvider(): array
    {
        return [
            ['SKU-1', 10, [GetStockItemDataInterface::QUANTITY => 8.5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-1', 20, null],
            ['SKU-1', 30, [GetStockItemDataInterface::QUANTITY => 8.5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-2', 10, null],
            ['SKU-2', 20, [GetStockItemDataInterface::QUANTITY => 5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-2', 30, [GetStockItemDataInterface::QUANTITY => 5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-3', 10, [GetStockItemDataInterface::QUANTITY => 0, GetStockItemDataInterface::IS_SALABLE => 0]],
            ['SKU-3', 20, null],
            ['SKU-3', 30, [GetStockItemDataInterface::QUANTITY => 0, GetStockItemDataInterface::IS_SALABLE => 0]],
        ];
    }
}
