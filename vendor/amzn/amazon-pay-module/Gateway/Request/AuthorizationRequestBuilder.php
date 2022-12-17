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

namespace Amazon\Payment\Gateway\Request;

use Magento\Payment\Gateway\ConfigInterface;
use Magento\Payment\Gateway\Request\BuilderInterface;
use Amazon\Payment\Gateway\Helper\SubjectReader;
use Amazon\Core\Helper\Data;
use Amazon\Core\Model\AmazonConfig;
use Magento\Framework\Event\ManagerInterface;
use Magento\Framework\DataObject;
use Amazon\Payment\Plugin\AdditionalInformation;
use Amazon\Core\Helper\CategoryExclusion;

/**
 * @deprecated As of February 2021, this Legacy Amazon Pay plugin has been
 * deprecated, in favor of a newer Amazon Pay version available through GitHub
 * and Magento Marketplace. Please download the new plugin for automatic
 * updates and to continue providing your customers with a seamless checkout
 * experience. Please see https://pay.amazon.com/help/E32AAQBC2FY42HS for details
 * and installation instructions.
 */
class AuthorizationRequestBuilder implements BuilderInterface
{
    /**
     * @var ConfigInterface
     */
    private $config;

    /**
     * @var SubjectReader
     */
    private $subjectReader;

    /**
     * @var Data
     */
    private $coreHelper;

    /**
     * @var AmazonConfig
     */
    private $amazonConfig;

    /**
     * @var ManagerInterface
     */
    private $eventManager;

    /**
     * @var CategoryExclusion
     */
    private $categoryExclusion;

    /**
     * AuthorizationRequestBuilder constructor.
     *
     * @param ConfigInterface $config
     * @param SubjectReader $subjectReader
     * @param Data $coreHelper
     * @param AmazonConfig $amazonConfig
     * @param ManagerInterface $eventManager
     * @param CategoryExclusion $categoryExclusion
     */
    public function __construct(
        ConfigInterface $config,
        SubjectReader $subjectReader,
        Data $coreHelper,
        AmazonConfig $amazonConfig,
        ManagerInterface $eventManager,
        CategoryExclusion $categoryExclusion
    ) {
        $this->config = $config;
        $this->coreHelper = $coreHelper;
        $this->amazonConfig = $amazonConfig;
        $this->subjectReader = $subjectReader;
        $this->eventManager = $eventManager;
        $this->categoryExclusion = $categoryExclusion;
    }

    /**
     * Builds ENV request
     *
     * @param  array $buildSubject
     * @return array
     */
    public function build(array $buildSubject)
    {
        $data = [];

        $paymentDO = $this->subjectReader->readPayment($buildSubject);
        $payment = $paymentDO->getPayment();
        $orderDO = $paymentDO->getOrder();
        $storeId = $orderDO->getStoreId();
        $storeName = '';

        $currencyCode = $payment->getOrder()->getOrderCurrencyCode();
        if ($payment->getAmazonDisplayInvoiceAmount()) {
            $total = $payment->getAmazonDisplayInvoiceAmount();
        }
        else {
            $total = $payment->getAmountOrdered();
        }

        // capture sale or new auth/capture for partial capture
        if (isset($buildSubject['multicurrency']) && $buildSubject['multicurrency']['multicurrency']) {
            $currencyCode = $buildSubject['multicurrency']['order_currency'];
            $total = $buildSubject['multicurrency']['total'];
            $storeName = $buildSubject['multicurrency']['store_name'];
            $storeId = $buildSubject['multicurrency']['store_id'];
        } else {
            // auth has not happened for this order yet
            if ($this->amazonConfig->useMultiCurrency($storeId)) {
                $quote = $this->subjectReader->getQuote();
                $total = $quote->getGrandTotal();
                $currencyCode = $quote->getQuoteCurrencyCode();
            }
        }


        if (isset($buildSubject['amazon_order_id']) && $buildSubject['amazon_order_id']) {
            $amazonId = $buildSubject['amazon_order_id'];
        } else {
            $quote = $this->subjectReader->getQuote();

            if (!$quote->getReservedOrderId()) {
                try {
                    $quote->reserveOrderId()->save();
                } catch (\Exception $e) {
                    $this->logger->debug($e->getMessage());
                }
            }

            $storeName = $quote->getStore()->getName();
            $amazonId = $this->subjectReader->getAmazonId();
        }

        if ($amazonId) {
                $data = [
                    'amazon_order_reference_id' => $amazonId,
                    'amount' => $total,
                    'currency_code' => $currencyCode,
                    'store_name' => $storeName,
                    'custom_information' =>
                        'Magento Version : 2, ' .
                        'Plugin Version : ' . $this->coreHelper->getVersion(),
                    'platform_id' => $this->config->getValue('platform_id'),
                    'request_payment_authorization' => true
                ];
        }

        if ($this->coreHelper->isSandboxEnabled('store', $storeId)) {
            $data['additional_information'] =
                $payment->getAdditionalInformation(AdditionalInformation::KEY_SANDBOX_SIMULATION_REFERENCE);

            $transport = new DataObject($data);
            $this->eventManager->dispatch(
                'amazon_payment_authorize_before',
                [
                    'context' => 'authorization',
                    'payment' => $paymentDO->getPayment(),
                    'transport' => $transport
                ]
            );
            $data = $transport->getData();
        }

        return $data;
    }
}
