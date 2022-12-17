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
namespace Amazon\Core\Domain;

use Amazon\Core\Api\Data\AmazonAddressInterface;

/**
 * @deprecated As of February 2021, this Legacy Amazon Pay plugin has been
 * deprecated, in favor of a newer Amazon Pay version available through GitHub
 * and Magento Marketplace. Please download the new plugin for automatic
 * updates and to continue providing your customers with a seamless checkout
 * experience. Please see https://pay.amazon.com/help/E32AAQBC2FY42HS for details
 * and installation instructions.
 */
class AmazonAddressDecoratorJp implements AmazonAddressInterface
{
    /**
     * @var AmazonAddressInterface
     */
    private $amazonAddress;

    /**
     * @param AmazonAddressInterface $amazonAddress
     */
    public function __construct(
        AmazonAddressInterface $amazonAddress
    ) {
        $this->amazonAddress = $amazonAddress;
    }

    /**
     * {@inheritdoc}
     */
    public function getLines()
    {
        return $this->amazonAddress->getLines();
    }

    /**
     * {@inheritdoc}
     */
    public function getCompany()
    {
        return $this->amazonAddress->getCompany();
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstName()
    {
        return $this->amazonAddress->getFirstName();
    }

    /**
     * {@inheritdoc}
     */
    public function getLastName()
    {
        return $this->amazonAddress->getLastName();
    }

    /**
     * {@inheritdoc}
     */
    public function getCity()
    {
        return $this->amazonAddress->getCity() ?? '-';
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        return $this->amazonAddress->getState();
    }

    /**
     * {@inheritdoc}
     */
    public function getPostCode()
    {
        return $this->amazonAddress->getPostCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getCountryCode()
    {
        return $this->amazonAddress->getCountryCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getTelephone()
    {
        return $this->amazonAddress->getTelephone();
    }

    /**
     * {@inheritdoc}
     */
    public function getLine($lineNumber)
    {
        $lines = $this->getLines();
        if (isset($lines[$lineNumber-1])) {
            return $lines[$lineNumber-1];
        }
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function shiftLines($times)
    {
        return $this->amazonAddress->shiftLines($times);
    }

    /**
     * {@inheritdoc}
     */
    public function setCompany($company)
    {
        return $this->amazonAddress->setCompany($company);
    }
}
