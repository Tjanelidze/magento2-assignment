<?php
/**
 * Copyright 2016 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://aws.amazon.com/apache2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */
namespace Amazon\Payment\Api;

use Magento\Framework\Exception\LocalizedException;

/**
 * @api
 */
interface OrderInformationManagementInterface
{
    /**
     * @param string $amazonOrderReferenceId
     * @param array $allowedConstraints
     * @return void
     * @throws LocalizedException
     */
    public function saveOrderInformation($amazonOrderReferenceId, $allowedConstraints = []);

    /**
     * @param string $amazonOrderReferenceId
     * @param null|integer $storeId
     * @return void
     * @throws LocalizedException
     */
    public function confirmOrderReference($amazonOrderReferenceId, $storeId = null);

    /**
     * @param string $amazonOrderReferenceId
     * @param null|integer $storeId
     * @return void
     * @throws LocalizedException
     */
    public function closeOrderReference($amazonOrderReferenceId, $storeId = null);

    /**
     * @param string $amazonOrderReferenceId
     * @param null|integer $storeId
     * @return void
     * @throws LocalizedException
     */
    public function cancelOrderReference($amazonOrderReferenceId, $storeId = null);

    /**
     * @return void
     */
    public function removeOrderReference();
}
