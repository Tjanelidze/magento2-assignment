<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryCatalog\Test\Integration\CatalogInventory\Api\StockRegistry;

use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\InventoryCatalogApi\Api\DefaultStockProviderInterface;
use Magento\InventoryCatalogApi\Model\GetProductIdsBySkusInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class GetStockStatusBySkuOnDefaultStockTest extends TestCase
{
    /**
     * @var StockRegistryInterface
     */
    private $stockRegistry;

    /**
     * @var DefaultStockProviderInterface
     */
    private $defaultStockProvider;

    /**
     * @var GetProductIdsBySkusInterface
     */
    private $getProductIdsBySkus;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->stockRegistry = Bootstrap::getObjectManager()->get(StockRegistryInterface::class);
        $this->getProductIdsBySkus = Bootstrap::getObjectManager()->get(GetProductIdsBySkusInterface::class);
        $this->defaultStockProvider = Bootstrap::getObjectManager()->get(DefaultStockProviderInterface::class);
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryCatalog::Test/_files/source_items_on_default_source.php
     *
     * @param string $sku
     * @param int $status
     * @param float $qty
     *
     * @dataProvider getStatusDataProvider
     */
    public function testGetStatusIfScopeIdParameterIsNotPassed(string $sku, int $status, float $qty): void
    {
        $stockStatus = $this->stockRegistry->getStockStatusBySku($sku);

        self::assertEquals($status, $stockStatus->getStockStatus());
        self::assertEquals($qty, $stockStatus->getQty());
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryCatalog::Test/_files/source_items_on_default_source.php
     *
     * @param string $sku
     * @param int $status
     * @param float $qty
     *
     * @dataProvider getStatusDataProvider
     */
    public function testGetStatusIfScopeIdParameterIsPassed(string $sku, int $status, float $qty): void
    {
        $stockStatus = $this->stockRegistry->getStockStatusBySku($sku, $this->defaultStockProvider->getId());

        self::assertEquals($status, $stockStatus->getStockStatus());
        self::assertEquals($qty, $stockStatus->getQty());
    }

    /**
     * @return array
     */
    public function getStatusDataProvider(): array
    {
        return [
            ['SKU-1', 1, 5.5],
            ['SKU-2', 1, 5],
            ['SKU-3', 0, 0], // Qty = 6 and Status = Out_Of_Stock thus Salable Quantity = 0
        ];
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryCatalog::Test/_files/source_items_on_default_source.php
     */
    public function testGetStatusIfNotExistedScopeIdIsPassed(): void
    {
        $this->expectException(\Magento\Framework\Exception\NoSuchEntityException::class);
        $notExistedScopeId = 100;
        $this->stockRegistry->getStockStatusBySku('SKU-1', $notExistedScopeId);
    }
}
