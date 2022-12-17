<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventorySales\Test\Integration\IsProductSalable;

use Magento\InventorySalesApi\Api\AreProductsSalableInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class MinQtyConditionTest extends TestCase
{
    /**
     * @var AreProductsSalableInterface
     */
    private $areProductsSalable;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->areProductsSalable = Bootstrap::getObjectManager()->get(AreProductsSalableInterface::class);
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
     * @param bool $expectedResult
     * @return void
     *
     * @dataProvider executeWithMinQtyDataProvider
     *
     * @magentoDbIsolation disabled
     */
    public function testExecuteWithMinQty(string $sku, int $stockId, bool $expectedResult): void
    {
        $result = $this->areProductsSalable->execute([$sku], $stockId);
        $result = current($result);
        self::assertEquals($expectedResult, $result->isSalable());
    }

    /**
     * @return array
     */
    public function executeWithMinQtyDataProvider(): array
    {
        return [
            ['SKU-1', 10, true],
            ['SKU-1', 20, false],
            ['SKU-1', 30, true],
            ['SKU-2', 10, false],
            ['SKU-2', 20, false],
            ['SKU-2', 30, false],
            ['SKU-3', 10, false],
            ['SKU-3', 20, false],
            ['SKU-3', 30, false],
            ['SKU-6', 10, true],
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
     * @param bool $expectedResult
     * @return void
     *
     * @dataProvider executeWithManageStockFalseAndMinQty
     *
     * @magentoDbIsolation disabled
     */
    public function testExecuteWithManageStockFalseAndMinQty(string $sku, int $stockId, bool $expectedResult)
    {
        $result = $this->areProductsSalable->execute([$sku], $stockId);
        $result = current($result);
        self::assertEquals($expectedResult, $result->isSalable());
    }

    /**
     * @return array
     */
    public function executeWithManageStockFalseAndMinQty(): array
    {
        return [
            ['SKU-1', 10, true],
            ['SKU-1', 20, false],
            ['SKU-1', 30, true],
            ['SKU-2', 10, false],
            ['SKU-2', 20, true],
            ['SKU-2', 30, true],
            ['SKU-3', 10, true],
            ['SKU-3', 20, false],
            ['SKU-3', 30, true],
            ['SKU-6', 10, true],
        ];
    }
}
