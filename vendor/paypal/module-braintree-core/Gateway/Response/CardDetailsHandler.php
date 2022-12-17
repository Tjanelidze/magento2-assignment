<?php
/**
 * Copyright © 2013-2017 Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace PayPal\Braintree\Gateway\Response;

use PayPal\Braintree\Gateway\Config\Config;
use PayPal\Braintree\Gateway\Helper\SubjectReader;
use Magento\Framework\Exception\InputException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Payment\Gateway\Helper\ContextHelper;
use Magento\Payment\Gateway\Response\HandlerInterface;
use Magento\Sales\Api\Data\OrderPaymentInterface;

class CardDetailsHandler implements HandlerInterface
{
    const CARD_TYPE = 'cardType';

    const CARD_EXP_MONTH = 'expirationMonth';

    const CARD_EXP_YEAR = 'expirationYear';

    const CARD_LAST4 = 'last4';

    const CARD_NUMBER = 'cc_number';

    /**
     * @var Config
     */
    private $config;

    /**
     * @var SubjectReader
     */
    private $subjectReader;

    /**
     * Constructor
     *
     * @param Config $config
     * @param SubjectReader $subjectReader
     */
    public function __construct(
        Config $config,
        SubjectReader $subjectReader
    ) {
        $this->config = $config;
        $this->subjectReader = $subjectReader;
    }

    /**
     * @param array $handlingSubject
     * @param array $response
     * @throws InputException
     * @throws NoSuchEntityException
     */
    public function handle(array $handlingSubject, array $response)
    {
        $paymentDO = $this->subjectReader->readPayment($handlingSubject);
        $transaction = $this->subjectReader->readTransaction($response);

        $payment = $paymentDO->getPayment();
        ContextHelper::assertOrderPayment($payment);

        // Web Payments API - Google Pay
        if (!empty($transaction->androidPayCard['sourceCardLast4'])) {
            $creditCard = $transaction->androidPayCard;
            $payment->setCcLast4($creditCard['sourceCardLast4']);
            $payment->setCcExpMonth($creditCard[self::CARD_EXP_MONTH]);
            $payment->setCcExpYear($creditCard[self::CARD_EXP_YEAR]);
            $payment->setCcType($this->getCreditCardType($creditCard['sourceCardType']));
            $payment->setAdditionalInformation(OrderPaymentInterface::CC_TYPE, $creditCard['sourceCardType']);
            $payment->setAdditionalInformation(self::CARD_NUMBER, 'xxxx-' . $creditCard['sourceCardLast4']);
        } else {
            $creditCard = $transaction->creditCard;
            $payment->setCcLast4($creditCard[self::CARD_LAST4]);
            $payment->setCcExpMonth($creditCard[self::CARD_EXP_MONTH]);
            $payment->setCcExpYear($creditCard[self::CARD_EXP_YEAR]);
            $payment->setCcType($this->getCreditCardType($creditCard[self::CARD_TYPE]));
            $payment->setAdditionalInformation(OrderPaymentInterface::CC_TYPE, $creditCard[self::CARD_TYPE]);
            $payment->setAdditionalInformation(self::CARD_NUMBER, 'xxxx-' . $creditCard[self::CARD_LAST4]);
        }
    }

    /**
     * Get type of credit card mapped from Braintree
     *
     * @param string $type
     * @return string
     * @throws InputException
     * @throws NoSuchEntityException
     */
    private function getCreditCardType(string $type): string
    {
        $replaced = str_replace(' ', '-', strtolower($type));
        $mapper = $this->config->getCcTypesMapper();

        return $mapper[$replaced];
    }
}
