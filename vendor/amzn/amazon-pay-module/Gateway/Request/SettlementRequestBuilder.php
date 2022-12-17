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

use Amazon\Payment\Gateway\Config\Config;
use Magento\Payment\Gateway\Request\BuilderInterface;
use Amazon\Payment\Gateway\Helper\SubjectReader;
use Amazon\Core\Helper\Data;
use Magento\Payment\Model\Method\Logger;
use Magento\Sales\Api\OrderRepositoryInterface;
use Magento\Quote\Api\CartRepositoryInterface;

/**
 * @deprecated As of February 2021, this Legacy Amazon Pay plugin has been
 * deprecated, in favor of a newer Amazon Pay version available through GitHub
 * and Magento Marketplace. Please download the new plugin for automatic
 * updates and to continue providing your customers with a seamless checkout
 * experience. Please see https://pay.amazon.com/help/E32AAQBC2FY42HS for details
 * and installation instructions.
 */
class SettlementRequestBuilder implements BuilderInterface
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var Logger
     */
    private $logger;

    /**
     * @var SubjectReader
     */
    private $subjectReader;

    /**
     * @var Data
     */
    private $coreHelper;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var CartRepositoryInterface
     */
    private $quoteRepository;

    /**
     * SettlementRequestBuilder constructor.
     *
     * @param Config $config
     * @param OrderRepositoryInterface $orderRepository
     * @param CartRepositoryInterface $quoteRepository
     * @param SubjectReader $subjectReader
     * @param Data $coreHelper
     * @param Logger $logger
     */
    public function __construct(
        Config $config,
        OrderRepositoryInterface $orderRepository,
        CartRepositoryInterface $quoteRepository,
        SubjectReader $subjectReader,
        Data $coreHelper,
        Logger $logger
    ) {
        $this->config = $config;
        $this->orderRepository = $orderRepository;
        $this->quoteRepository = $quoteRepository;
        $this->coreHelper = $coreHelper;
        $this->subjectReader = $subjectReader;
        $this->logger = $logger;
    }

    /**
     * @param \Magento\Sales\Model\Order\Payment $payment
     * @return \Magento\Sales\Model\Order\Invoice
     */
    protected function getCurrentInvoice($payment)
    {
        $result = null;
        $order = $payment->getOrder();
        foreach ($order->getInvoiceCollection() as $invoice) {
            if (!$invoice->getId()) {
                $result = $invoice;
                break;
            }
        }
        return $result;
    }

    /**
     * @param \Magento\Sales\Model\Order\Payment $payment
     * @return string
     */
    protected function getSellerNote($payment)
    {
        $result = '';
        $invoice = $this->getCurrentInvoice($payment);
        if ($invoice && $invoice->getComments()) {
            foreach ($invoice->getComments() as $comment) {
                if ($comment->getComment()) {
                    $result = $comment->getComment();
                    break;
                }
            }
        }
        return $result;
    }

    /**
     * @param array $buildSubject
     * @return array
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function build(array $buildSubject)
    {
        $data = [];

        $paymentDO = $this->subjectReader->readPayment($buildSubject);
        $orderDO = $paymentDO->getOrder();
        $order = $paymentDO->getPayment()->getOrder();
        $payment = $paymentDO->getPayment();

        $currencyCode = $order->getOrderCurrencyCode();
        if ($payment->getAmazonDisplayInvoiceAmount()) {
            $total = $payment->getAmazonDisplayInvoiceAmount();
        }
        else {
            $total = $payment->getAmountOrdered();
        }

        if ($buildSubject['multicurrency']['multicurrency']) {
            $currencyCode = $buildSubject['multicurrency']['order_currency'];
            $total = $buildSubject['multicurrency']['total'];
        }


        if (isset($buildSubject['amazon_order_id']) && $buildSubject['amazon_order_id']) {
                $data = [
                    'amazon_authorization_id' => $paymentDO->getPayment()->getParentTransactionId(),
                    'capture_amount' => $total,
                    'currency_code' => $currencyCode,
                    'amazon_order_reference_id' => $buildSubject['amazon_order_id'],
                    'store_id' => $buildSubject['multicurrency']['store_id'],
                    'store_name' => $buildSubject['multicurrency']['store_name'],
                    'custom_information' =>
                        'Magento Version : 2, ' .
                        'Plugin Version : ' . $this->coreHelper->getVersion(),
                    'platform_id' => $this->config->getValue('platform_id'),
                    'request_payment_authorization' => false
                ];

                if (isset($buildSubject['request_payment_authorization']) && $buildSubject['request_payment_authorization']) {
                    $data['request_payment_authorization'] = true;
                }
        }

        if ($this->coreHelper->isSandboxEnabled('store', $orderDO->getStoreId())) {
            $data['seller_note'] = $this->getSellerNote($paymentDO->getPayment());
        }

        return $data;
    }
}
