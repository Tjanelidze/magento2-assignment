<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryCatalog\Test\Integration\CatalogInventory\Api\StockRegistry;

use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Store\Model\StoreManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class GetStockStatusBySkuTest extends TestCase
{
    /**
     * @var StockRegistryInterface
     */
    private $stockRegistry;

    /**
     * @var StoreManagerInterface
     */
    private $storeManager;

    /**
     * @var string
     */
    private $storeCodeBefore;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->stockRegistry = Bootstrap::getObjectManager()->get(StockRegistryInterface::class);
        $this->storeManager = Bootstrap::getObjectManager()->get(StoreManagerInterface::class);
        $this->storeCodeBefore = $this->storeManager->getStore()->getCode();
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventorySalesApi::Test/_files/websites_with_stores.php
     * @magentoDataFixture Magento_InventorySalesApi::Test/_files/stock_website_sales_channels.php
     * @magentoDataFixture Magento_InventoryIndexer::Test/_files/reindex_inventory.php
     * @magentoDbIsolation disabled
     *
     * @param string $storeCode
     * @param string $sku
     * @param int $status
     * @param float $qty
     *
     * @dataProvider getStatusDataProvider
     */
    public function testGetStatusIfScopeIdParameterIsNotPassed(
        string $storeCode,
        string $sku,
        int $status,
        float $qty
    ): void {
        $this->storeManager->setCurrentStore($storeCode);

        $stockStatus = $this->stockRegistry->getStockStatusBySku($sku);

        self::assertEquals($status, $stockStatus->getStockStatus());
        self::assertEquals($qty, $stockStatus->getQty());
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventorySalesApi::Test/_files/websites_with_stores.php
     * @magentoDataFixture Magento_InventorySalesApi::Test/_files/stock_website_sales_channels.php
     * @magentoDataFixture Magento_InventoryIndexer::Test/_files/reindex_inventory.php
     * @magentoDbIsolation disabled
     *
     * @param string $storeCode
     * @param string $sku
     * @param int $status
     * @param float $qty
     *
     * @dataProvider getStatusDataProvider
     */
    public function testGetStatusIfScopeIdParameterIsPassed(
        string $storeCode,
        string $sku,
        int $status,
        float $qty
    ): void {
        $this->storeManager->setCurrentStore($storeCode);
        $websiteId = $this->storeManager->getWebsite()->getId();
        $stockStatus = $this->stockRegistry->getStockStatusBySku($sku, $websiteId);

        self::assertEquals($status, $stockStatus->getStockStatus());
        self::assertEquals($qty, $stockStatus->getQty());
    }

    /**
     * @return array
     */
    public function getStatusDataProvider(): array
    {
        return [
            ['store_for_eu_website', 'SKU-1', 1, 8.5],
            ['store_for_us_website', 'SKU-1', 0, 0],
            ['store_for_global_website', 'SKU-1', 1, 8.5],
            ['store_for_eu_website', 'SKU-2', 0, 0],
            ['store_for_us_website', 'SKU-2', 1, 5],
            ['store_for_global_website', 'SKU-2', 1, 5],
            ['store_for_eu_website', 'SKU-3', 0, 0],
            ['store_for_us_website', 'SKU-3', 0, 0],
            ['store_for_global_website', 'SKU-3', 0, 0],
        ];
    }

    /**
     * @inheritdoc
     */
    protected function tearDown(): void
    {
        $this->storeManager->setCurrentStore($this->storeCodeBefore);

        parent::tearDown();
    }
}
