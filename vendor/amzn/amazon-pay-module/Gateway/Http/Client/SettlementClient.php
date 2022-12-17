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

namespace Amazon\Payment\Gateway\Http\Client;

/**
 * Class SettlementClient
 * Amazon Pay capture client
 *
 * @deprecated As of February 2021, this Legacy Amazon Pay plugin has been
 * deprecated, in favor of a newer Amazon Pay version available through GitHub
 * and Magento Marketplace. Please download the new plugin for automatic
 * updates and to continue providing your customers with a seamless checkout
 * experience. Please see https://pay.amazon.com/help/E32AAQBC2FY42HS for details
 * and installation instructions.
 */
class SettlementClient extends AbstractClient
{
    /**
     * @inheritdoc
     */
    protected function process(array $data)
    {
        $response = [];

        // check to see if authorization is still valid
        if ($this->adapter->checkAuthorizationStatus($data)) {
            $captureData = [
                'amazon_authorization_id' => $data['amazon_authorization_id'],
                'capture_amount' => $data['capture_amount'],
                'currency_code' => $data['currency_code'],
                'capture_reference_id' => $data['amazon_order_reference_id'] . '-C' . time()
            ];
            if (isset($data['seller_note'])) {
                $captureData['seller_capture_note'] = $data['seller_note'];
            }

            $response = $this->adapter->completeCapture($captureData, $data['store_id'], $data['amazon_order_reference_id']);
            $response['reauthorized'] = false;
        } else {
            // if invalid - reauthorize and capture
            $captureData = [
                'amazon_order_reference_id' => $data['amazon_order_reference_id'],
                'amount' => $data['capture_amount'],
                'currency_code' => $data['currency_code'],
                'store_name' => $data['store_name'],
                'custom_information' => $data['custom_information'],
                'platform_id' => $data['platform_id']
            ];
            if (isset($data['seller_note'])) {
                $captureData['seller_authorization_note'] = $data['seller_note'];
            }
            $response = $this->adapter->authorize($data, true);
            $response['reauthorized'] = true;
        }

        return $response;
    }
}
