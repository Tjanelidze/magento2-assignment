<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

use Magento\InventoryApi\Api\StockRepositoryInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Framework\Exception\NoSuchEntityException;

/** @var StockRepositoryInterface $stockRepository */
$stockRepository = Bootstrap::getObjectManager()->get(StockRepositoryInterface::class);
try {
    $stockRepository->deleteById(10);
} catch (NoSuchEntityException $e) {
    //Stock already removed
}
