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
namespace Amazon\Payment\Domain\Details;

use Amazon\Payment\Domain\AmazonAuthorizationStatus;
use Amazon\Payment\Domain\AmazonAuthorizationStatusFactory;

/**
 * @deprecated As of February 2021, this Legacy Amazon Pay plugin has been
 * deprecated, in favor of a newer Amazon Pay version available through GitHub
 * and Magento Marketplace. Please download the new plugin for automatic
 * updates and to continue providing your customers with a seamless checkout
 * experience. Please see https://pay.amazon.com/help/E32AAQBC2FY42HS for details
 * and installation instructions.
 */
class AmazonAuthorizationDetails
{
    /**
     * @var AmazonAuthorizationStatus
     */
    private $status;

    /**
     * @var string|null
     */
    private $captureTransactionId;

    /**
     * @var string|null
     */
    private $authorizeTransactionId;

    /**
     * @var bool
     */
    private $captureNow = false;

    /**
     * AmazonAuthorizationDetails constructor.
     *
     * @param AmazonAuthorizationStatusFactory $amazonAuthorizationStatusFactory
     * @param array                            $details
     */
    public function __construct(AmazonAuthorizationStatusFactory $amazonAuthorizationStatusFactory, array $details)
    {
        $status       = $details['AuthorizationStatus'];
        $this->status = $amazonAuthorizationStatusFactory->create([
            'state'      => $status['State'],
            'reasonCode' => (isset($status['ReasonCode']) ? $status['ReasonCode'] : null)
        ]);

        if (isset($details['IdList']['member'])) {
            $this->captureTransactionId = $details['IdList']['member'];
        }

        if (isset($details['AmazonAuthorizationId'])) {
            $this->authorizeTransactionId = $details['AmazonAuthorizationId'];
        }

        if (isset($details['CaptureNow'])) {
            $this->captureNow = ('true' === $details['CaptureNow']);
        }
    }

    /**
     * Get status
     *
     * @return AmazonAuthorizationStatus
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Get authorize transaction id
     *
     * @return string|null
     */
    public function getAuthorizeTransactionId()
    {
        return $this->authorizeTransactionId;
    }

    /**
     * Get capture transaction id
     *
     * @return string|null
     */
    public function getCaptureTransactionId()
    {
        return $this->captureTransactionId;
    }

    /**
     * Has capture
     *
     * @return bool
     */
    public function hasCapture()
    {
        return $this->captureNow;
    }

    /**
     * Is pending
     *
     * @return bool
     */
    public function isPending()
    {
        return (AmazonAuthorizationStatus::STATE_PENDING === $this->getStatus()->getState());
    }
}
