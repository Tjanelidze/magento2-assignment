<?php
/**
 * This file is part of the Klarna KP module
 *
 * (c) Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\Kp\Gateway\Handler;

use Magento\Payment\Gateway\Config\ValueHandlerInterface;
use Magento\Quote\Model\Quote\Payment;
use Klarna\Kp\Api\QuoteRepositoryInterface as KlarnaQuoteRepositoryInterface;
use Magento\Framework\Exception\NoSuchEntityException;

class TitleHandler implements ValueHandlerInterface
{
    const DEFAULT_TITLE        = 'Klarna Payments';
    const DEFAULT_TITLE_FORMAT = '%s (%s)';

    /**
     * @var KlarnaQuoteRepositoryInterface
     */
    private $klarnaQuoteRepository;

    /**
     * @param KlarnaQuoteRepositoryInterface $klarnaQuoteRepository
     * @codeCoverageIgnore
     */
    public function __construct(KlarnaQuoteRepositoryInterface $klarnaQuoteRepository)
    {
        $this->klarnaQuoteRepository = $klarnaQuoteRepository;
    }

    /**
     * Retrieve method configured value
     *
     * @param array    $subject
     * @param int|null $storeId
     * @return mixed
     * @SuppressWarnings(PMD.UnusedFormalParameter)
     */
    public function handle(array $subject, $storeId = null)
    {
        if (!isset($subject['payment'])) {
            return self::DEFAULT_TITLE;
        }
        /** @var Payment $payment */
        $payment = $subject['payment']->getPayment();
        $title = $this->getTitle($payment);

        return $title;
    }

    /**
     * Get title for specified payment method
     *
     * @param Payment $payment
     * @return string
     */
    public function getTitle($payment)
    {
        if ($payment->getAdditionalInformation('method_title')) {
            return $payment->getAdditionalInformation('method_title');
        }

        if ($payment->getMethod()) {
            return $this->getTitleFromKlarnaQuote($payment);
        }

        if ($payment->hasAdditionalInformation('method_code')) {
            return sprintf(
                self::DEFAULT_TITLE_FORMAT,
                self::DEFAULT_TITLE,
                $payment->hasAdditionalInformation('method_code')
            );
        }
        return self::DEFAULT_TITLE;
    }

    /**
     * We try to retrieve the title from the stored Klarna quote
     *
     * @param Payment $payment
     * @return string
     * @throws NoSuchEntityException
     */
    private function getTitleFromKlarnaQuote(Payment $payment): string
    {
        $klarnaQuote = $this->klarnaQuoteRepository->getActiveByQuote($payment->getQuote());
        if (!$klarnaQuote) {
            return self::DEFAULT_TITLE;
        }
        $paymentCategories = $klarnaQuote->getPaymentMethodInfo();
        foreach ($paymentCategories as $paymentCategory) {
            if ($paymentCategory->identifier === str_replace("klarna_", "", $payment->getMethod())) {
                return $paymentCategory->name;
            }
        }
        return self::DEFAULT_TITLE;
    }
}
