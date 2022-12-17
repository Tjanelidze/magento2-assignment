<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryCatalog\Test\Integration;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\InventoryCatalog\Model\GetDefaultSourceItemBySku;
use PHPUnit\Framework\TestCase;
use Magento\TestFramework\Helper\Bootstrap;

class UpdateDefaultSourceItemAtProductSaveTest extends TestCase
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepository;

    /**
     * @var GetDefaultSourceItemBySku
     */
    private $getDefaultSourceItemBySku;

    protected function setUp(): void
    {
        parent::setUp();

        $this->productRepository = Bootstrap::getObjectManager()->create(ProductRepositoryInterface::class);
        $this->getDefaultSourceItemBySku = Bootstrap::getObjectManager()->get(GetDefaultSourceItemBySku::class);
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDbIsolation enabled
     */
    public function testSaveOutOfStockProductNotAssignedToDefaultSource()
    {
        // SKU-3 is out of stock
        $product = $this->productRepository->get('SKU-3');
        $this->productRepository->save($product);

        $defaultSourceItem = $this->getDefaultSourceItemBySku->execute('SKU-3');
        self::assertNull(
            $defaultSourceItem,
            'Default source was accidentally created on a product not assigned while saving it'
        );
    }
}
