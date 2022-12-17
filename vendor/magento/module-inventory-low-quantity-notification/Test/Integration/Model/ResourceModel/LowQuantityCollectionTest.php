<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryLowQuantityNotification\Test\Integration\Model\ResourceModel;

use Magento\InventoryLowQuantityNotification\Model\ResourceModel\LowQuantityCollection;
use Magento\InventoryLowQuantityNotificationApi\Api\Data\SourceItemConfigurationInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class LowQuantityCollectionTest extends TestCase
{
    /**
     * @var LowQuantityCollection
     */
    private $lowQuantityCollection;

    protected function setUp(): void
    {
        $this->lowQuantityCollection = Bootstrap::getObjectManager()->create(LowQuantityCollection::class);
    }

    // @codingStandardsIgnoreStart
    /**
     * Tests that products from disabled sources are not present.
     * Each source code is used exclusively in one source item, so we check only source codes.
     *
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stocks.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/stock_source_links.php
     * @magentoDataFixture Magento_InventoryLowQuantityNotificationApi::Test/_files/source_item_configuration.php
     */
    // @codingStandardsIgnoreEnd
    public function testLowQuantityCollection()
    {
        $expectedSourceCodes = [
            'eu-1'
        ];
        $actualSourceCodes = $this->lowQuantityCollection->getColumnValues(
            SourceItemConfigurationInterface::SOURCE_CODE
        );

        $this->assertEquals($expectedSourceCodes, $actualSourceCodes);
    }
}
