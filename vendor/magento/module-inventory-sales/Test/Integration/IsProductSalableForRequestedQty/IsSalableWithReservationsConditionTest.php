<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventorySales\Test\Integration\IsProductSalableForRequestedQty;

use Magento\InventoryConfigurationApi\Api\Data\StockItemConfigurationInterface;
use Magento\InventoryConfigurationApi\Api\GetStockItemConfigurationInterface;
use Magento\InventoryConfigurationApi\Api\SaveStockItemConfigurationInterface;
use Magento\InventoryReservationsApi\Model\AppendReservationsInterface;
use Magento\InventoryReservationsApi\Model\CleanupReservationsInterface;
use Magento\InventoryReservationsApi\Model\ReservationBuilderInterface;
use Magento\InventorySalesApi\Api\AreProductsSalableForRequestedQtyInterface;
use Magento\InventorySalesApi\Api\Data\IsProductSalableForRequestedQtyRequestInterfaceFactory;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class IsSalableWithReservationsConditionTest extends TestCase
{
    /**
     * @var ReservationBuilderInterface
     */
    private $reservationBuilder;

    /**
     * @var AppendReservationsInterface
     */
    private $appendReservations;

    /**
     * @var CleanupReservationsInterface
     */
    private $cleanupReservations;

    /**
     * @var AreProductsSalableForRequestedQtyInterface
     */
    private $areProductsSalableForRequestedQty;

    /**
     * @var GetStockItemConfigurationInterface
     */
    private $getStockItemConfiguration;

    /**
     * @var SaveStockItemConfigurationInterface
     */
    private $saveStockItemConfiguration;

    /**
     * @var IsProductSalableForRequestedQtyRequestInterfaceFactory
     */
    private $isProductSalableForRequestedQtyRequestFactory;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->reservationBuilder = Bootstrap::getObjectManager()->get(ReservationBuilderInterface::class);
        $this->appendReservations = Bootstrap::getObjectManager()->get(AppendReservationsInterface::class);
        $this->cleanupReservations = Bootstrap::getObjectManager()->get(CleanupReservationsInterface::class);
        $this->areProductsSalableForRequestedQty
            = Bootstrap::getObjectManager()->get(AreProductsSalableForRequestedQtyInterface::class);
        $this->isProductSalableForRequestedQtyRequestFactory = Bootstrap::getObjectManager()
            ->get(IsProductSalableForRequestedQtyRequestInterfaceFactory::class);
        $this->getStockItemConfiguration = Bootstrap::getObjectManager()->get(
            GetStockItemConfigurationInterface::class
        );
        $this->saveStockItemConfiguration = Bootstrap::getObjectManager()->get(
            SaveStockItemConfigurationInterface::class
        );
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryIndexer::Test/_files/reindex_inventory.php
     *
     * @param string $sku
     * @param int $stockId
     * @param bool $isSalable
     *
     * @dataProvider productIsSalableDataProvider
     *
     * @magentoDbIsolation disabled
     */
    public function testProductIsSalable(string $sku, int $stockId, float $qty, bool $isSalable)
    {
        $request = $this->isProductSalableForRequestedQtyRequestFactory->create(
            [
                'sku' => $sku,
                'qty' => $qty,
            ]
        );
        $result = $this->areProductsSalableForRequestedQty->execute([$request], $stockId);
        $result = current($result);
        self::assertEquals($isSalable, $result->isSalable());
    }

    /**
     * @return array
     */
    public function productIsSalableDataProvider(): array
    {
        return [
            ['SKU-1', 10, 1, true],
            ['SKU-1', 20, 1, false],
            ['SKU-1', 30, 1, true],
            ['SKU-2', 10, 1, false],
            ['SKU-2', 20, 1, true],
            ['SKU-2', 30, 1, true],
            ['SKU-3', 10, 1, false],
            ['SKU-3', 20, 1, false],
            ['SKU-3', 30, 1, false],
        ];
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryIndexer::Test/_files/reindex_inventory.php
     *
     * @magentoConfigFixture default_store cataloginventory/item_options/min_qty 5
     *
     * @param string $sku
     * @param int $stockId
     * @param bool $isSalable
     *
     * @dataProvider productIsSalableWithUseConfigMinQtyDataProvider
     *
     * @magentoDbIsolation disabled
     */
    public function testProductIsSalableWithUseConfigMinQty(string $sku, int $stockId, float $qty, bool $isSalable)
    {
        /** @var StockItemConfigurationInterface $stockItemConfiguration */
        $stockItemConfiguration = $this->getStockItemConfiguration->execute($sku, $stockId);
        $stockItemConfiguration->setUseConfigMinQty(true);
        $this->saveStockItemConfiguration->execute($sku, $stockId, $stockItemConfiguration);

        $request = $this->isProductSalableForRequestedQtyRequestFactory->create(
            [
                'sku' => $sku,
                'qty' => $qty,
            ]
        );
        $result = $this->areProductsSalableForRequestedQty->execute([$request], $stockId);
        $result = current($result);
        self::assertEquals($isSalable, $result->isSalable());
    }

    /**
     * @return array
     */
    public function productIsSalableWithUseConfigMinQtyDataProvider(): array
    {
        return [
            ['SKU-1', 10, 3, true],
            ['SKU-1', 10, 4, false],
            ['SKU-1', 30, 3, true],
            ['SKU-1', 30, 4, false],
            ['SKU-2', 20, 1, false],
            ['SKU-2', 30, 1, false],
            ['SKU-3', 10, 1, false],
            ['SKU-3', 30, 1, false],
        ];
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryIndexer::Test/_files/reindex_inventory.php
     *
     * @param string $sku
     * @param int $stockId
     * @param bool $isSalable
     *
     * @dataProvider productIsSalableWithMinQtyDataProvider
     *
     * @magentoDbIsolation disabled
     */
    public function testProductIsSalableWithMinQty(string $sku, int $stockId, float $qty, bool $isSalable)
    {
        /** @var StockItemConfigurationInterface $stockItemConfiguration */
        $stockItemConfiguration = $this->getStockItemConfiguration->execute($sku, $stockId);
        $stockItemConfiguration->setUseConfigMinQty(false);
        $stockItemConfiguration->setMinQty(5);
        $this->saveStockItemConfiguration->execute($sku, $stockId, $stockItemConfiguration);

        $request = $this->isProductSalableForRequestedQtyRequestFactory->create(
            [
                'sku' => $sku,
                'qty' => $qty,
            ]
        );
        $result = $this->areProductsSalableForRequestedQty->execute([$request], $stockId);
        $result = current($result);
        self::assertEquals($isSalable, $result->isSalable());
    }

    /**
     * @return array
     */
    public function productIsSalableWithMinQtyDataProvider(): array
    {
        return [
            ['SKU-1', 10, 3, true],
            ['SKU-1', 10, 4, false],
            ['SKU-1', 30, 3, true],
            ['SKU-1', 30, 4, false],
            ['SKU-2', 20, 1, false],
            ['SKU-2', 30, 1, false],
            ['SKU-3', 10, 1, false],
            ['SKU-3', 30, 1, false],
        ];
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryIndexer::Test/_files/reindex_inventory.php
     *
     * @magentoDbIsolation disabled
     */
    public function testProductIsOutOfStockIfReservationsArePresent()
    {
        // emulate order placement (reserve -8.5 units)
        $this->appendReservations->execute([
            $this->reservationBuilder->setStockId(10)->setSku('SKU-1')->setQuantity(-8.5)->build(),
        ]);
        $request = $this->isProductSalableForRequestedQtyRequestFactory->create(
            [
                'sku' => 'SKU-1',
                'qty' => 1,
            ]
        );
        $result = $this->areProductsSalableForRequestedQty->execute([$request], 10);
        $result = current($result);
        self::assertFalse($result->isSalable());

        $this->appendReservations->execute([
            // unreserve 8.5 units for cleanup
            $this->reservationBuilder->setStockId(10)->setSku('SKU-1')->setQuantity(8.5)->build(),
        ]);
        $this->cleanupReservations->execute();
    }

    /**
     * @see https://app.hiptest.com/projects/69435/test-plan/folders/909051/scenarios/3041232
     *
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryIndexer::Test/_files/reindex_inventory.php
     *
     * @magentoDbIsolation disabled
     */
    public function testProductIsSalableWithMinQtyAndReservationArePresent()
    {
        $sku = 'SKU-1';
        $stockId = 10;

        $stockItemConfiguration = $this->getStockItemConfiguration->execute($sku, $stockId);
        $stockItemConfiguration->setUseConfigMinQty(false);
        $stockItemConfiguration->setUseConfigMinSaleQty(false);
        $stockItemConfiguration->setIsQtyDecimal(true);
        $stockItemConfiguration->setMinSaleQty(-1.0);
        $stockItemConfiguration->setMinQty(-1.0);
        $stockItemConfiguration->setUseConfigBackorders(false);
        $stockItemConfiguration->setBackorders(StockItemConfigurationInterface::BACKORDERS_YES_NONOTIFY);
        $this->saveStockItemConfiguration->execute($sku, $stockId, $stockItemConfiguration);

        $this->appendReservations->execute(
            [
                $this->reservationBuilder->setStockId($stockId)->setSku($sku)->setQuantity(-9.33)->build()
            ]
        );

        $request = $this->isProductSalableForRequestedQtyRequestFactory->create(
            [
                'sku' => $sku,
                'qty' => 0.17,
            ]
        );
        $result = $this->areProductsSalableForRequestedQty->execute([$request], $stockId);
        $result = current($result);
        self::assertTrue($result->isSalable());

        $this->appendReservations->execute([
            $this->reservationBuilder->setStockId(10)->setSku('SKU-1')->setQuantity(9.33)->build(),
        ]);

        $this->cleanupReservations->execute();
    }
}
