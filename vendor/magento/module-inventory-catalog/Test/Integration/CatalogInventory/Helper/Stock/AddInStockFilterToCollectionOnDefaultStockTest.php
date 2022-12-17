<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryCatalog\Test\Integration\CatalogInventory\Helper\Stock;

use Magento\Catalog\Model\ResourceModel\Product\Link\Product\Collection;
use Magento\CatalogInventory\Helper\Stock;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class AddInStockFilterToCollectionOnDefaultStockTest extends TestCase
{
    /**
     * @var Stock
     */
    private $stockHelper;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->stockHelper = Bootstrap::getObjectManager()->get(Stock::class);
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryCatalog::Test/_files/source_items_on_default_source.php
     */
    public function testAddInStockFilterToCollection()
    {
        /** @var Collection $collection */
        $collection = Bootstrap::getObjectManager()->create(Collection::class);

        $this->stockHelper->addInStockFilterToCollection($collection);

        self::assertEquals(4, $collection->getSize());
    }
}
