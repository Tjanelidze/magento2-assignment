<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventorySales\Test\Integration\GetStockItemData;

use Magento\InventorySalesApi\Model\GetStockItemDataInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class MinQtyConditionTest extends TestCase
{
    /**
     * @var GetStockItemDataInterface
     */
    private $getStockItemData;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->getStockItemData = Bootstrap::getObjectManager()->get(GetStockItemDataInterface::class);
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryIndexer::Test/_files/reindex_inventory.php
     * @magentoConfigFixture default_store cataloginventory/item_options/min_qty 5
     *
     * @param string $sku
     * @param int $stockId
     * @param $expectedData
     * @return void
     *
     * @dataProvider executeWithMinQtyDataProvider
     *
     * @magentoDbIsolation disabled
     */
    public function testExecuteWithMinQty(string $sku, int $stockId, $expectedData)
    {
        $stockItemData = $this->getStockItemData->execute($sku, $stockId);

        self::assertEquals($expectedData, $stockItemData);
    }

    /**
     * @return array
     */
    public function executeWithMinQtyDataProvider(): array
    {
        return [
            ['SKU-1', 10, [GetStockItemDataInterface::QUANTITY => 8.5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-1', 20, null],
            ['SKU-1', 30, [GetStockItemDataInterface::QUANTITY => 8.5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-2', 10, null],
            ['SKU-2', 20, [GetStockItemDataInterface::QUANTITY => 5, GetStockItemDataInterface::IS_SALABLE => 0]],
            ['SKU-2', 30, [GetStockItemDataInterface::QUANTITY => 5, GetStockItemDataInterface::IS_SALABLE => 0]],
            ['SKU-3', 10, [GetStockItemDataInterface::QUANTITY => 0, GetStockItemDataInterface::IS_SALABLE => 0]],
            ['SKU-3', 20, null],
            ['SKU-3', 30, [GetStockItemDataInterface::QUANTITY => 0, GetStockItemDataInterface::IS_SALABLE => 0]],
        ];
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryIndexer::Test/_files/reindex_inventory.php
     * @magentoConfigFixture default_store cataloginventory/item_options/min_qty 5
     * @magentoConfigFixture default_store cataloginventory/item_options/manage_stock 0
     *
     * @param string $sku
     * @param int $stockId
     * @param $expectedData
     * @return void
     *
     * @dataProvider executeWithManageStockFalseAndMinQty
     *
     * @magentoDbIsolation disabled
     */
    public function testExecuteWithManageStockFalseAndMinQty(string $sku, int $stockId, $expectedData)
    {
        $stockItemData = $this->getStockItemData->execute($sku, $stockId);

        self::assertEquals($expectedData, $stockItemData);
    }

    /**
     * @return array
     */
    public function executeWithManageStockFalseAndMinQty(): array
    {
        return [
            ['SKU-1', 10, [GetStockItemDataInterface::QUANTITY => 8.5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-1', 20, null],
            ['SKU-1', 30, [GetStockItemDataInterface::QUANTITY => 8.5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-2', 10, null],
            ['SKU-2', 20, [GetStockItemDataInterface::QUANTITY => 5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-2', 30, [GetStockItemDataInterface::QUANTITY => 5, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-3', 10, [GetStockItemDataInterface::QUANTITY => 0, GetStockItemDataInterface::IS_SALABLE => 1]],
            ['SKU-3', 20, null],
            ['SKU-3', 30, [GetStockItemDataInterface::QUANTITY => 0, GetStockItemDataInterface::IS_SALABLE => 1]],
        ];
    }
}
