<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventorySalesApi\Api\Data;

/**
 * Represents the sales event that brings to appending reservations.
 *
 * @api
 */
interface SalesEventInterface extends \Magento\Framework\Api\ExtensibleDataInterface
{
    /**#@+
     * Constants for event types
     */
    const EVENT_ORDER_PLACED = 'order_placed';
    const EVENT_ORDER_CANCELED = 'order_canceled';
    const EVENT_ORDER_PLACE_FAILED = 'order_place_failed';
    const EVENT_SHIPMENT_CREATED = 'shipment_created';
    const EVENT_CREDITMEMO_CREATED = 'creditmemo_created';
    const EVENT_INVOICE_CREATED = 'invoice_created';
    /**#@-*/

    /**#@+
     * Constants for event object types
     */
    const OBJECT_TYPE_ORDER = 'order';
    /**#@-*/

    /**
     * Get type
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Get object type
     *
     * @return string
     */
    public function getObjectType(): string;

    /**
     * Get object id
     *
     * @return string
     */
    public function getObjectId(): string;

    /**
     * Retrieve existing extension attributes object
     *
     * @return \Magento\InventorySalesApi\Api\Data\SalesEventExtensionInterface|null
     */
    public function getExtensionAttributes(): ?\Magento\InventorySalesApi\Api\Data\SalesEventExtensionInterface;

    /**
     * Set an extension attributes object
     *
     * @param \Magento\InventorySalesApi\Api\Data\SalesEventExtensionInterface $extensionAttributes
     * @return void
     */
    public function setExtensionAttributes(
        \Magento\InventorySalesApi\Api\Data\SalesEventExtensionInterface $extensionAttributes
    ): void;
}
