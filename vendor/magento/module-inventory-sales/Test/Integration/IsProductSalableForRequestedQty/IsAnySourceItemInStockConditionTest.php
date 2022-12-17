<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventorySales\Test\Integration\IsProductSalableForRequestedQty;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\CatalogInventory\Api\Data\StockItemInterface;
use Magento\CatalogInventory\Api\StockItemCriteriaInterfaceFactory;
use Magento\CatalogInventory\Api\StockItemRepositoryInterface;
use Magento\InventorySalesApi\Api\AreProductsSalableForRequestedQtyInterface;
use Magento\InventorySalesApi\Api\Data\IsProductSalableForRequestedQtyRequestInterfaceFactory;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class IsAnySourceItemInStockConditionTest extends TestCase
{
    /**
     * @var AreProductsSalableForRequestedQtyInterface
     */
    private $areProductsSalableForRequestedQty;

    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var StockItemCriteriaInterfaceFactory
     */
    private $stockItemCriteriaFactory;

    /**
     * @var StockItemRepositoryInterface
     */
    private $stockItemRepository;

    /**
     * @var IsProductSalableForRequestedQtyRequestInterfaceFactory
     */
    private $isProductSalableForRequestedQtyRequestFactory;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $this->areProductsSalableForRequestedQty = $objectManager->get(
            AreProductsSalableForRequestedQtyInterface::class
        );
        $this->isProductSalableForRequestedQtyRequestFactory = $objectManager->get(
            IsProductSalableForRequestedQtyRequestInterfaceFactory::class
        );
        $this->productRepository = $objectManager->get(ProductRepositoryInterface::class);
        $this->stockItemCriteriaFactory = $objectManager->get(StockItemCriteriaInterfaceFactory::class);
        $this->stockItemRepository = $objectManager->get(StockItemRepositoryInterface::class);
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     *
     * @dataProvider sourceItemsStockData
     *
     * @magentoDbIsolation disabled
     *
     * @param string $sku
     * @param int $stockId
     * @param bool $expected
     * @return void
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function testSourceItemsAreOutOfStock(string $sku, int $stockId, bool $expected): void
    {
        $product = $this->productRepository->get($sku);
        $stockItemSearchCriteria = $this->stockItemCriteriaFactory->create();
        $stockItemSearchCriteria->setProductsFilter($product->getId());
        $stockItemsCollection = $this->stockItemRepository->getList($stockItemSearchCriteria);

        /** @var StockItemInterface $legacyStockItem */
        $legacyStockItem = current($stockItemsCollection->getItems());
        $legacyStockItem->setBackorders(1);
        $legacyStockItem->setUseConfigBackorders(0);
        $this->stockItemRepository->save($legacyStockItem);
        $request = $this->isProductSalableForRequestedQtyRequestFactory->create(
            [
                'sku' => $sku,
                'qty' => 1,
            ]
        );
        $result = $this->areProductsSalableForRequestedQty->execute([$request], $stockId);
        $result = current($result);
        $this->assertEquals($expected, $result->isSalable());
    }

    /**
     * @return array
     */
    public function sourceItemsStockData(): array
    {
        return [
            ['SKU-1', 10, true],
            ['SKU-1', 20, false],
            ['SKU-1', 30, true],
            ['SKU-2', 10, false],
            ['SKU-2', 20, true],
            ['SKU-2', 30, true],
            ['SKU-3', 10, false],
            ['SKU-3', 20, false],
            ['SKU-3', 30, false],
        ];
    }
}
