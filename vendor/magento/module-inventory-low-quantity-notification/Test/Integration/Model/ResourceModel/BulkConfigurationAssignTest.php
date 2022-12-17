<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryLowQuantityNotification\Test\Integration\Model\ResourceModel;

use Magento\InventoryLowQuantityNotification\Model\ResourceModel\BulkConfigurationAssign;
use Magento\InventoryLowQuantityNotificationApi\Api\GetSourceItemConfigurationInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

class BulkConfigurationAssignTest extends TestCase
{
    /**
     * @var BulkConfigurationAssign
     */
    private $bulkConfigurationAssign;

    /**
     * @var GetSourceItemConfigurationInterface
     */
    private $getSourceItemConfiguration;

    public function setUp(): void
    {
        parent::setUp();
        $this->bulkConfigurationAssign = Bootstrap::getObjectManager()->get(BulkConfigurationAssign::class);
        $this->getSourceItemConfiguration =
            Bootstrap::getObjectManager()->create(GetSourceItemConfigurationInterface::class);
    }

    /**
     * @magentoDataFixture Magento_InventoryApi::Test/_files/sources.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/products.php
     * @magentoDataFixture Magento_InventoryApi::Test/_files/source_items.php
     * @magentoDataFixture Magento_InventoryLowQuantityNotificationApi::Test/_files/source_item_configuration.php
     * @magentoDbIsolation enabled
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function testAssignOnExisting()
    {
        $this->bulkConfigurationAssign->execute(['SKU-1'], ['eu-1']);
        $sourceConfig = $this->getSourceItemConfiguration->execute('eu-1', 'SKU-1');

        self::assertEquals(
            5.6,
            $sourceConfig->getNotifyStockQty(),
            'Low stock notification configuration was changed assigning on existing source'
        );
    }
}
