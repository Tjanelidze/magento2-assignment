<?php
/**
 * This file is part of the Klarna Kp module
 *
 * (c) Klarna AB
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\Kp\Plugin\Payment\Helper;

use Klarna\Kp\Api\PaymentMethodListInterface;
use Magento\Checkout\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Payment\Model\MethodInterface;
use Magento\Quote\Api\CartRepositoryInterface;
use Magento\Quote\Api\Data\CartInterface;
use Magento\Sales\Api\OrderRepositoryInterface;
use Klarna\Kp\Api\QuoteRepositoryInterface;
use Klarna\Kp\Model\Session as KlarnaSession;
use Klarna\Core\Exception as KlarnaException;
use Psr\Log\LoggerInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class DataPlugin
{
    /**
     * @var CartInterface
     */
    private $quote;

    /**
     * @var OrderRepositoryInterface
     */
    private $orderRepository;

    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var CartRepositoryInterface
     */
    private $mageQuoteRepository;

    /**
     * @var Session
     */
    private $session;

    /**
     * @var PaymentMethodListInterface
     */
    private $paymentMethodList;

    /**
     * @var ScopeConfigInterface
     */
    private $config;
    /**
     * @var QuoteRepositoryInterface
     */
    private $quoteRepository;
    /**
     * @var KlarnaSession
     */
    private $klarnaSession;
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param RequestInterface           $request
     * @param OrderRepositoryInterface   $orderRepository
     * @param CartRepositoryInterface    $mageQuoteRepository
     * @param Session                    $session
     * @param ScopeConfigInterface       $config
     * @param PaymentMethodListInterface $paymentMethodList
     * @param QuoteRepositoryInterface   $quoteRepository
     * @param KlarnaSession              $klarnaSession
     * @param LoggerInterface            $logger
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        RequestInterface $request,
        OrderRepositoryInterface $orderRepository,
        CartRepositoryInterface $mageQuoteRepository,
        Session $session,
        ScopeConfigInterface $config,
        PaymentMethodListInterface $paymentMethodList,
        QuoteRepositoryInterface $quoteRepository,
        KlarnaSession $klarnaSession,
        LoggerInterface $logger
    ) {
        $this->request = $request;
        $this->orderRepository = $orderRepository;
        $this->mageQuoteRepository = $mageQuoteRepository;
        $this->session = $session;
        $this->config = $config;
        $this->paymentMethodList = $paymentMethodList;
        $this->quoteRepository = $quoteRepository;
        $this->klarnaSession = $klarnaSession;
        $this->logger = $logger;
    }

    /**
     * Modify results of getPaymentMethods() call to add in Klarna methods returned by API
     *
     * @param \Magento\Payment\Helper\Data $subject
     * @param                              $result
     * @return array
     * @SuppressWarnings(PMD.UnusedFormalParameter)
     */
    public function afterGetPaymentMethods(\Magento\Payment\Helper\Data $subject, $result)
    {
        if (!$this->klarnaSession->canSendRequest()) {
            return $result;
        }
        $quote = $this->getQuote();
        if (!$quote || !$quote->getIsActive()) {
            return $result;
        }

        if (!$this->isKlarnaOrderUpdateSuccessful($quote)) {
            return $result;
        }

        $methods = $this->paymentMethodList->getKlarnaMethodInfo($quote);
        if (empty($methods)) {
            return $result;
        }
        foreach ($methods as $method) {
            $code = 'klarna_' . $method->identifier;
            $result[$code] = $result['klarna_kp'];
            $result[$code]['title'] = $method->name;
        }
        return $result;
    }

    /**
     * Returns true if the Klarna update order request is successful
     *
     * @param CartInterface $quote
     * @return bool
     */
    private function isKlarnaOrderUpdateSuccessful(CartInterface $quote): bool
    {
        try {
            $sessionId = $this->quoteRepository->getActiveByQuote($quote)->getSessionId();
            $response = $this->klarnaSession->init($sessionId);
            if (!$response->isSuccessfull()) {
                return false;
            }
        } catch (NoSuchEntityException $e) {
            $this->logger->error($e);
            return false;
        } catch (KlarnaException $e) {
            $this->logger->error($e);
            return false;
        }

        return true;
    }

    /**
     * @return CartInterface|\Magento\Quote\Model\Quote|null
     */
    private function getQuote()
    {
        if ($this->quote) {
            return $this->quote;
        }
        try {
            $order = $this->getOrder();
            if ($order) {
                $this->quote = $this->mageQuoteRepository->get($order->getQuoteId());
                return $this->quote;
            }
            $this->quote = $this->session->getQuote();
        } catch (NoSuchEntityException $e) {
            return null;
        }
        return $this->quote;
    }

    /**
     * @return \Magento\Sales\Api\Data\OrderInterface|bool
     */
    private function getOrder()
    {
        $id = $this->request->getParam('order_id');
        if (!$id) {
            return false;
        }
        try {
            return $this->orderRepository->get($id);
        } catch (LocalizedException $e) {
            return false;
        }
    }

    /**
     * Modify results of getMethodInstance() call to add in details about Klarna payment methods
     *
     * @param \Magento\Payment\Helper\Data $subject
     * @param callable                     $proceed
     * @param string                       $code
     * @return MethodInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     * @SuppressWarnings(PMD.UnusedFormalParameter)
     */
    public function aroundGetMethodInstance(\Magento\Payment\Helper\Data $subject, callable $proceed, $code)
    {
        if (false === strpos($code, 'klarna_')) {
            return $proceed($code);
        }
        if ($code === 'klarna_kco') {
            return $proceed($code);
        }
        return $this->paymentMethodList->getPaymentMethod($code);
    }
}
