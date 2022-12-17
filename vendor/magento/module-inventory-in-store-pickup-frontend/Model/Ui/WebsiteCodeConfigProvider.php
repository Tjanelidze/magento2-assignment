<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryInStorePickupFrontend\Model\Ui;

use Magento\Checkout\Model\ConfigProviderInterface;
use Magento\InventoryInStorePickupFrontend\Model\GetCurrentWebsiteCode;

/**
 * Provide website for current store.
 */
class WebsiteCodeConfigProvider implements ConfigProviderInterface
{
    /**
     * @var GetCurrentWebsiteCode
     */
    private $getCurrentWebsiteCode;

    /**
     * @param GetCurrentWebsiteCode $getCurrentWebsiteCode
     */
    public function __construct(GetCurrentWebsiteCode $getCurrentWebsiteCode)
    {
        $this->getCurrentWebsiteCode = $getCurrentWebsiteCode;
    }

    /**
     * Returns current website code to checkoutConfig
     *
     * @return array
     */
    public function getConfig()
    {
        return ['websiteCode' => $this->getCurrentWebsiteCode->execute()];
    }
}
