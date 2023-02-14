<?php
namespace Magento\Sales\Model\Order;

/**
 * Interceptor class for @see \Magento\Sales\Model\Order
 */
class Interceptor extends \Magento\Sales\Model\Order implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Model\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory, \Magento\Framework\Api\AttributeValueFactory $customAttributeFactory, \Magento\Framework\Stdlib\DateTime\TimezoneInterface $timezone, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Sales\Model\Order\Config $orderConfig, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\Sales\Model\ResourceModel\Order\Item\CollectionFactory $orderItemCollectionFactory, \Magento\Catalog\Model\Product\Visibility $productVisibility, \Magento\Sales\Api\InvoiceManagementInterface $invoiceManagement, \Magento\Directory\Model\CurrencyFactory $currencyFactory, \Magento\Eav\Model\Config $eavConfig, \Magento\Sales\Model\Order\Status\HistoryFactory $orderHistoryFactory, \Magento\Sales\Model\ResourceModel\Order\Address\CollectionFactory $addressCollectionFactory, \Magento\Sales\Model\ResourceModel\Order\Payment\CollectionFactory $paymentCollectionFactory, \Magento\Sales\Model\ResourceModel\Order\Status\History\CollectionFactory $historyCollectionFactory, \Magento\Sales\Model\ResourceModel\Order\Invoice\CollectionFactory $invoiceCollectionFactory, \Magento\Sales\Model\ResourceModel\Order\Shipment\CollectionFactory $shipmentCollectionFactory, \Magento\Sales\Model\ResourceModel\Order\Creditmemo\CollectionFactory $memoCollectionFactory, \Magento\Sales\Model\ResourceModel\Order\Shipment\Track\CollectionFactory $trackCollectionFactory, \Magento\Sales\Model\ResourceModel\Order\CollectionFactory $salesOrderCollectionFactory, \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency, \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productListFactory, ?\Magento\Framework\Model\ResourceModel\AbstractResource $resource = null, ?\Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null, array $data = [], ?\Magento\Framework\Locale\ResolverInterface $localeResolver = null, ?\Magento\Sales\Model\Order\ProductOption $productOption = null, ?\Magento\Sales\Api\OrderItemRepositoryInterface $itemRepository = null, ?\Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder = null, ?\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig = null, ?\Magento\Directory\Model\RegionFactory $regionFactory = null)
    {
        $this->___init();
        parent::__construct($context, $registry, $extensionFactory, $customAttributeFactory, $timezone, $storeManager, $orderConfig, $productRepository, $orderItemCollectionFactory, $productVisibility, $invoiceManagement, $currencyFactory, $eavConfig, $orderHistoryFactory, $addressCollectionFactory, $paymentCollectionFactory, $historyCollectionFactory, $invoiceCollectionFactory, $shipmentCollectionFactory, $memoCollectionFactory, $trackCollectionFactory, $salesOrderCollectionFactory, $priceCurrency, $productListFactory, $resource, $resourceCollection, $data, $localeResolver, $productOption, $itemRepository, $searchCriteriaBuilder, $scopeConfig, $regionFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function unsetData($key = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'unsetData');
        return $pluginInfo ? $this->___callPlugins('unsetData', func_get_args(), $pluginInfo) : parent::unsetData($key);
    }

    /**
     * {@inheritdoc}
     */
    public function getActionFlag($action)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getActionFlag');
        return $pluginInfo ? $this->___callPlugins('getActionFlag', func_get_args(), $pluginInfo) : parent::getActionFlag($action);
    }

    /**
     * {@inheritdoc}
     */
    public function setActionFlag($action, $flag)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setActionFlag');
        return $pluginInfo ? $this->___callPlugins('setActionFlag', func_get_args(), $pluginInfo) : parent::setActionFlag($action, $flag);
    }

    /**
     * {@inheritdoc}
     */
    public function getCanSendNewEmailFlag()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCanSendNewEmailFlag');
        return $pluginInfo ? $this->___callPlugins('getCanSendNewEmailFlag', func_get_args(), $pluginInfo) : parent::getCanSendNewEmailFlag();
    }

    /**
     * {@inheritdoc}
     */
    public function setCanSendNewEmailFlag($flag)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCanSendNewEmailFlag');
        return $pluginInfo ? $this->___callPlugins('setCanSendNewEmailFlag', func_get_args(), $pluginInfo) : parent::setCanSendNewEmailFlag($flag);
    }

    /**
     * {@inheritdoc}
     */
    public function loadByIncrementId($incrementId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadByIncrementId');
        return $pluginInfo ? $this->___callPlugins('loadByIncrementId', func_get_args(), $pluginInfo) : parent::loadByIncrementId($incrementId);
    }

    /**
     * {@inheritdoc}
     */
    public function loadByIncrementIdAndStoreId($incrementId, $storeId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadByIncrementIdAndStoreId');
        return $pluginInfo ? $this->___callPlugins('loadByIncrementIdAndStoreId', func_get_args(), $pluginInfo) : parent::loadByIncrementIdAndStoreId($incrementId, $storeId);
    }

    /**
     * {@inheritdoc}
     */
    public function loadByAttribute($attribute, $value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadByAttribute');
        return $pluginInfo ? $this->___callPlugins('loadByAttribute', func_get_args(), $pluginInfo) : parent::loadByAttribute($attribute, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getStore()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStore');
        return $pluginInfo ? $this->___callPlugins('getStore', func_get_args(), $pluginInfo) : parent::getStore();
    }

    /**
     * {@inheritdoc}
     */
    public function canCancel()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canCancel');
        return $pluginInfo ? $this->___callPlugins('canCancel', func_get_args(), $pluginInfo) : parent::canCancel();
    }

    /**
     * {@inheritdoc}
     */
    public function canVoidPayment()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canVoidPayment');
        return $pluginInfo ? $this->___callPlugins('canVoidPayment', func_get_args(), $pluginInfo) : parent::canVoidPayment();
    }

    /**
     * {@inheritdoc}
     */
    public function canInvoice()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canInvoice');
        return $pluginInfo ? $this->___callPlugins('canInvoice', func_get_args(), $pluginInfo) : parent::canInvoice();
    }

    /**
     * {@inheritdoc}
     */
    public function canCreditmemo()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canCreditmemo');
        return $pluginInfo ? $this->___callPlugins('canCreditmemo', func_get_args(), $pluginInfo) : parent::canCreditmemo();
    }

    /**
     * {@inheritdoc}
     */
    public function canHold()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canHold');
        return $pluginInfo ? $this->___callPlugins('canHold', func_get_args(), $pluginInfo) : parent::canHold();
    }

    /**
     * {@inheritdoc}
     */
    public function canUnhold()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canUnhold');
        return $pluginInfo ? $this->___callPlugins('canUnhold', func_get_args(), $pluginInfo) : parent::canUnhold();
    }

    /**
     * {@inheritdoc}
     */
    public function canComment()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canComment');
        return $pluginInfo ? $this->___callPlugins('canComment', func_get_args(), $pluginInfo) : parent::canComment();
    }

    /**
     * {@inheritdoc}
     */
    public function canShip()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canShip');
        return $pluginInfo ? $this->___callPlugins('canShip', func_get_args(), $pluginInfo) : parent::canShip();
    }

    /**
     * {@inheritdoc}
     */
    public function canEdit()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canEdit');
        return $pluginInfo ? $this->___callPlugins('canEdit', func_get_args(), $pluginInfo) : parent::canEdit();
    }

    /**
     * {@inheritdoc}
     */
    public function canReorder()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canReorder');
        return $pluginInfo ? $this->___callPlugins('canReorder', func_get_args(), $pluginInfo) : parent::canReorder();
    }

    /**
     * {@inheritdoc}
     */
    public function canReorderIgnoreSalable()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canReorderIgnoreSalable');
        return $pluginInfo ? $this->___callPlugins('canReorderIgnoreSalable', func_get_args(), $pluginInfo) : parent::canReorderIgnoreSalable();
    }

    /**
     * {@inheritdoc}
     */
    public function isPaymentReview()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isPaymentReview');
        return $pluginInfo ? $this->___callPlugins('isPaymentReview', func_get_args(), $pluginInfo) : parent::isPaymentReview();
    }

    /**
     * {@inheritdoc}
     */
    public function canReviewPayment()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canReviewPayment');
        return $pluginInfo ? $this->___callPlugins('canReviewPayment', func_get_args(), $pluginInfo) : parent::canReviewPayment();
    }

    /**
     * {@inheritdoc}
     */
    public function canFetchPaymentReviewUpdate()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canFetchPaymentReviewUpdate');
        return $pluginInfo ? $this->___callPlugins('canFetchPaymentReviewUpdate', func_get_args(), $pluginInfo) : parent::canFetchPaymentReviewUpdate();
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getConfig');
        return $pluginInfo ? $this->___callPlugins('getConfig', func_get_args(), $pluginInfo) : parent::getConfig();
    }

    /**
     * {@inheritdoc}
     */
    public function getPayment()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPayment');
        return $pluginInfo ? $this->___callPlugins('getPayment', func_get_args(), $pluginInfo) : parent::getPayment();
    }

    /**
     * {@inheritdoc}
     */
    public function setBillingAddress(?\Magento\Sales\Api\Data\OrderAddressInterface $address = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBillingAddress');
        return $pluginInfo ? $this->___callPlugins('setBillingAddress', func_get_args(), $pluginInfo) : parent::setBillingAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingAddress(?\Magento\Sales\Api\Data\OrderAddressInterface $address = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingAddress');
        return $pluginInfo ? $this->___callPlugins('setShippingAddress', func_get_args(), $pluginInfo) : parent::setShippingAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function getBillingAddress()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBillingAddress');
        return $pluginInfo ? $this->___callPlugins('getBillingAddress', func_get_args(), $pluginInfo) : parent::getBillingAddress();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingAddress()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingAddress');
        return $pluginInfo ? $this->___callPlugins('getShippingAddress', func_get_args(), $pluginInfo) : parent::getShippingAddress();
    }

    /**
     * {@inheritdoc}
     */
    public function setState($state)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setState');
        return $pluginInfo ? $this->___callPlugins('setState', func_get_args(), $pluginInfo) : parent::setState($state);
    }

    /**
     * {@inheritdoc}
     */
    public function getFrontendStatusLabel()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getFrontendStatusLabel');
        return $pluginInfo ? $this->___callPlugins('getFrontendStatusLabel', func_get_args(), $pluginInfo) : parent::getFrontendStatusLabel();
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusLabel()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStatusLabel');
        return $pluginInfo ? $this->___callPlugins('getStatusLabel', func_get_args(), $pluginInfo) : parent::getStatusLabel();
    }

    /**
     * {@inheritdoc}
     */
    public function addStatusToHistory($status, $comment = '', $isCustomerNotified = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addStatusToHistory');
        return $pluginInfo ? $this->___callPlugins('addStatusToHistory', func_get_args(), $pluginInfo) : parent::addStatusToHistory($status, $comment, $isCustomerNotified);
    }

    /**
     * {@inheritdoc}
     */
    public function addStatusHistoryComment($comment, $status = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addStatusHistoryComment');
        return $pluginInfo ? $this->___callPlugins('addStatusHistoryComment', func_get_args(), $pluginInfo) : parent::addStatusHistoryComment($comment, $status);
    }

    /**
     * {@inheritdoc}
     */
    public function addCommentToStatusHistory($comment, $status = false, $isVisibleOnFront = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addCommentToStatusHistory');
        return $pluginInfo ? $this->___callPlugins('addCommentToStatusHistory', func_get_args(), $pluginInfo) : parent::addCommentToStatusHistory($comment, $status, $isVisibleOnFront);
    }

    /**
     * {@inheritdoc}
     */
    public function setHistoryEntityName($entityName)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHistoryEntityName');
        return $pluginInfo ? $this->___callPlugins('setHistoryEntityName', func_get_args(), $pluginInfo) : parent::setHistoryEntityName($entityName);
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityType()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEntityType');
        return $pluginInfo ? $this->___callPlugins('getEntityType', func_get_args(), $pluginInfo) : parent::getEntityType();
    }

    /**
     * {@inheritdoc}
     */
    public function place()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'place');
        return $pluginInfo ? $this->___callPlugins('place', func_get_args(), $pluginInfo) : parent::place();
    }

    /**
     * {@inheritdoc}
     */
    public function hold()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hold');
        return $pluginInfo ? $this->___callPlugins('hold', func_get_args(), $pluginInfo) : parent::hold();
    }

    /**
     * {@inheritdoc}
     */
    public function unhold()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'unhold');
        return $pluginInfo ? $this->___callPlugins('unhold', func_get_args(), $pluginInfo) : parent::unhold();
    }

    /**
     * {@inheritdoc}
     */
    public function cancel()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'cancel');
        return $pluginInfo ? $this->___callPlugins('cancel', func_get_args(), $pluginInfo) : parent::cancel();
    }

    /**
     * {@inheritdoc}
     */
    public function isFraudDetected()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isFraudDetected');
        return $pluginInfo ? $this->___callPlugins('isFraudDetected', func_get_args(), $pluginInfo) : parent::isFraudDetected();
    }

    /**
     * {@inheritdoc}
     */
    public function registerCancellation($comment = '', $graceful = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'registerCancellation');
        return $pluginInfo ? $this->___callPlugins('registerCancellation', func_get_args(), $pluginInfo) : parent::registerCancellation($comment, $graceful);
    }

    /**
     * {@inheritdoc}
     */
    public function getTrackingNumbers()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTrackingNumbers');
        return $pluginInfo ? $this->___callPlugins('getTrackingNumbers', func_get_args(), $pluginInfo) : parent::getTrackingNumbers();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingMethod($asObject = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingMethod');
        return $pluginInfo ? $this->___callPlugins('getShippingMethod', func_get_args(), $pluginInfo) : parent::getShippingMethod($asObject);
    }

    /**
     * {@inheritdoc}
     */
    public function getAddressesCollection()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAddressesCollection');
        return $pluginInfo ? $this->___callPlugins('getAddressesCollection', func_get_args(), $pluginInfo) : parent::getAddressesCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getAddressById($addressId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAddressById');
        return $pluginInfo ? $this->___callPlugins('getAddressById', func_get_args(), $pluginInfo) : parent::getAddressById($addressId);
    }

    /**
     * {@inheritdoc}
     */
    public function addAddress(\Magento\Sales\Model\Order\Address $address)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addAddress');
        return $pluginInfo ? $this->___callPlugins('addAddress', func_get_args(), $pluginInfo) : parent::addAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemsCollection($filterByTypes = [], $nonChildrenOnly = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemsCollection');
        return $pluginInfo ? $this->___callPlugins('getItemsCollection', func_get_args(), $pluginInfo) : parent::getItemsCollection($filterByTypes, $nonChildrenOnly);
    }

    /**
     * {@inheritdoc}
     */
    public function getParentItemsRandomCollection($limit = 1)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getParentItemsRandomCollection');
        return $pluginInfo ? $this->___callPlugins('getParentItemsRandomCollection', func_get_args(), $pluginInfo) : parent::getParentItemsRandomCollection($limit);
    }

    /**
     * {@inheritdoc}
     */
    public function getAllItems()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllItems');
        return $pluginInfo ? $this->___callPlugins('getAllItems', func_get_args(), $pluginInfo) : parent::getAllItems();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllVisibleItems()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllVisibleItems');
        return $pluginInfo ? $this->___callPlugins('getAllVisibleItems', func_get_args(), $pluginInfo) : parent::getAllVisibleItems();
    }

    /**
     * {@inheritdoc}
     */
    public function getItemById($itemId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemById');
        return $pluginInfo ? $this->___callPlugins('getItemById', func_get_args(), $pluginInfo) : parent::getItemById($itemId);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemByQuoteItemId($quoteItemId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemByQuoteItemId');
        return $pluginInfo ? $this->___callPlugins('getItemByQuoteItemId', func_get_args(), $pluginInfo) : parent::getItemByQuoteItemId($quoteItemId);
    }

    /**
     * {@inheritdoc}
     */
    public function addItem(\Magento\Sales\Model\Order\Item $item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addItem');
        return $pluginInfo ? $this->___callPlugins('addItem', func_get_args(), $pluginInfo) : parent::addItem($item);
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentsCollection()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPaymentsCollection');
        return $pluginInfo ? $this->___callPlugins('getPaymentsCollection', func_get_args(), $pluginInfo) : parent::getPaymentsCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllPayments()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllPayments');
        return $pluginInfo ? $this->___callPlugins('getAllPayments', func_get_args(), $pluginInfo) : parent::getAllPayments();
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentById($paymentId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPaymentById');
        return $pluginInfo ? $this->___callPlugins('getPaymentById', func_get_args(), $pluginInfo) : parent::getPaymentById($paymentId);
    }

    /**
     * {@inheritdoc}
     */
    public function setPayment(?\Magento\Sales\Api\Data\OrderPaymentInterface $payment = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setPayment');
        return $pluginInfo ? $this->___callPlugins('setPayment', func_get_args(), $pluginInfo) : parent::setPayment($payment);
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusHistoryCollection()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStatusHistoryCollection');
        return $pluginInfo ? $this->___callPlugins('getStatusHistoryCollection', func_get_args(), $pluginInfo) : parent::getStatusHistoryCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllStatusHistory()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllStatusHistory');
        return $pluginInfo ? $this->___callPlugins('getAllStatusHistory', func_get_args(), $pluginInfo) : parent::getAllStatusHistory();
    }

    /**
     * {@inheritdoc}
     */
    public function getVisibleStatusHistory()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getVisibleStatusHistory');
        return $pluginInfo ? $this->___callPlugins('getVisibleStatusHistory', func_get_args(), $pluginInfo) : parent::getVisibleStatusHistory();
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusHistoryById($statusId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStatusHistoryById');
        return $pluginInfo ? $this->___callPlugins('getStatusHistoryById', func_get_args(), $pluginInfo) : parent::getStatusHistoryById($statusId);
    }

    /**
     * {@inheritdoc}
     */
    public function addStatusHistory(\Magento\Sales\Model\Order\Status\History $history)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addStatusHistory');
        return $pluginInfo ? $this->___callPlugins('addStatusHistory', func_get_args(), $pluginInfo) : parent::addStatusHistory($history);
    }

    /**
     * {@inheritdoc}
     */
    public function getRealOrderId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRealOrderId');
        return $pluginInfo ? $this->___callPlugins('getRealOrderId', func_get_args(), $pluginInfo) : parent::getRealOrderId();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderCurrency()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getOrderCurrency');
        return $pluginInfo ? $this->___callPlugins('getOrderCurrency', func_get_args(), $pluginInfo) : parent::getOrderCurrency();
    }

    /**
     * {@inheritdoc}
     */
    public function formatPrice($price, $addBrackets = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'formatPrice');
        return $pluginInfo ? $this->___callPlugins('formatPrice', func_get_args(), $pluginInfo) : parent::formatPrice($price, $addBrackets);
    }

    /**
     * {@inheritdoc}
     */
    public function formatPricePrecision($price, $precision, $addBrackets = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'formatPricePrecision');
        return $pluginInfo ? $this->___callPlugins('formatPricePrecision', func_get_args(), $pluginInfo) : parent::formatPricePrecision($price, $precision, $addBrackets);
    }

    /**
     * {@inheritdoc}
     */
    public function formatPriceTxt($price)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'formatPriceTxt');
        return $pluginInfo ? $this->___callPlugins('formatPriceTxt', func_get_args(), $pluginInfo) : parent::formatPriceTxt($price);
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseCurrency()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseCurrency');
        return $pluginInfo ? $this->___callPlugins('getBaseCurrency', func_get_args(), $pluginInfo) : parent::getBaseCurrency();
    }

    /**
     * {@inheritdoc}
     */
    public function formatBasePrice($price)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'formatBasePrice');
        return $pluginInfo ? $this->___callPlugins('formatBasePrice', func_get_args(), $pluginInfo) : parent::formatBasePrice($price);
    }

    /**
     * {@inheritdoc}
     */
    public function formatBasePricePrecision($price, $precision)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'formatBasePricePrecision');
        return $pluginInfo ? $this->___callPlugins('formatBasePricePrecision', func_get_args(), $pluginInfo) : parent::formatBasePricePrecision($price, $precision);
    }

    /**
     * {@inheritdoc}
     */
    public function isCurrencyDifferent()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isCurrencyDifferent');
        return $pluginInfo ? $this->___callPlugins('isCurrencyDifferent', func_get_args(), $pluginInfo) : parent::isCurrencyDifferent();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalDue()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotalDue');
        return $pluginInfo ? $this->___callPlugins('getTotalDue', func_get_args(), $pluginInfo) : parent::getTotalDue();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTotalDue()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTotalDue');
        return $pluginInfo ? $this->___callPlugins('getBaseTotalDue', func_get_args(), $pluginInfo) : parent::getBaseTotalDue();
    }

    /**
     * {@inheritdoc}
     */
    public function getData($key = '', $index = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getData');
        return $pluginInfo ? $this->___callPlugins('getData', func_get_args(), $pluginInfo) : parent::getData($key, $index);
    }

    /**
     * {@inheritdoc}
     */
    public function getInvoiceCollection()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getInvoiceCollection');
        return $pluginInfo ? $this->___callPlugins('getInvoiceCollection', func_get_args(), $pluginInfo) : parent::getInvoiceCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function setInvoiceCollection(\Magento\Sales\Model\ResourceModel\Order\Invoice\Collection $invoices)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setInvoiceCollection');
        return $pluginInfo ? $this->___callPlugins('setInvoiceCollection', func_get_args(), $pluginInfo) : parent::setInvoiceCollection($invoices);
    }

    /**
     * {@inheritdoc}
     */
    public function getShipmentsCollection()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShipmentsCollection');
        return $pluginInfo ? $this->___callPlugins('getShipmentsCollection', func_get_args(), $pluginInfo) : parent::getShipmentsCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getCreditmemosCollection()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCreditmemosCollection');
        return $pluginInfo ? $this->___callPlugins('getCreditmemosCollection', func_get_args(), $pluginInfo) : parent::getCreditmemosCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getTracksCollection()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTracksCollection');
        return $pluginInfo ? $this->___callPlugins('getTracksCollection', func_get_args(), $pluginInfo) : parent::getTracksCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function hasInvoices()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasInvoices');
        return $pluginInfo ? $this->___callPlugins('hasInvoices', func_get_args(), $pluginInfo) : parent::hasInvoices();
    }

    /**
     * {@inheritdoc}
     */
    public function hasShipments()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasShipments');
        return $pluginInfo ? $this->___callPlugins('hasShipments', func_get_args(), $pluginInfo) : parent::hasShipments();
    }

    /**
     * {@inheritdoc}
     */
    public function hasCreditmemos()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasCreditmemos');
        return $pluginInfo ? $this->___callPlugins('hasCreditmemos', func_get_args(), $pluginInfo) : parent::hasCreditmemos();
    }

    /**
     * {@inheritdoc}
     */
    public function getRelatedObjects()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRelatedObjects');
        return $pluginInfo ? $this->___callPlugins('getRelatedObjects', func_get_args(), $pluginInfo) : parent::getRelatedObjects();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerName');
        return $pluginInfo ? $this->___callPlugins('getCustomerName', func_get_args(), $pluginInfo) : parent::getCustomerName();
    }

    /**
     * {@inheritdoc}
     */
    public function addRelatedObject(\Magento\Framework\Model\AbstractModel $object)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addRelatedObject');
        return $pluginInfo ? $this->___callPlugins('addRelatedObject', func_get_args(), $pluginInfo) : parent::addRelatedObject($object);
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAtFormatted($format)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCreatedAtFormatted');
        return $pluginInfo ? $this->___callPlugins('getCreatedAtFormatted', func_get_args(), $pluginInfo) : parent::getCreatedAtFormatted($format);
    }

    /**
     * {@inheritdoc}
     */
    public function getEmailCustomerNote()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEmailCustomerNote');
        return $pluginInfo ? $this->___callPlugins('getEmailCustomerNote', func_get_args(), $pluginInfo) : parent::getEmailCustomerNote();
    }

    /**
     * {@inheritdoc}
     */
    public function getStoreGroupName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStoreGroupName');
        return $pluginInfo ? $this->___callPlugins('getStoreGroupName', func_get_args(), $pluginInfo) : parent::getStoreGroupName();
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'reset');
        return $pluginInfo ? $this->___callPlugins('reset', func_get_args(), $pluginInfo) : parent::reset();
    }

    /**
     * {@inheritdoc}
     */
    public function getIsNotVirtual()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getIsNotVirtual');
        return $pluginInfo ? $this->___callPlugins('getIsNotVirtual', func_get_args(), $pluginInfo) : parent::getIsNotVirtual();
    }

    /**
     * {@inheritdoc}
     */
    public function prepareInvoice($qtys = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'prepareInvoice');
        return $pluginInfo ? $this->___callPlugins('prepareInvoice', func_get_args(), $pluginInfo) : parent::prepareInvoice($qtys);
    }

    /**
     * {@inheritdoc}
     */
    public function isCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isCanceled');
        return $pluginInfo ? $this->___callPlugins('isCanceled', func_get_args(), $pluginInfo) : parent::isCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getIncrementId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getIncrementId');
        return $pluginInfo ? $this->___callPlugins('getIncrementId', func_get_args(), $pluginInfo) : parent::getIncrementId();
    }

    /**
     * {@inheritdoc}
     */
    public function getItems()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItems');
        return $pluginInfo ? $this->___callPlugins('getItems', func_get_args(), $pluginInfo) : parent::getItems();
    }

    /**
     * {@inheritdoc}
     */
    public function setItems($items)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setItems');
        return $pluginInfo ? $this->___callPlugins('setItems', func_get_args(), $pluginInfo) : parent::setItems($items);
    }

    /**
     * {@inheritdoc}
     */
    public function getAddresses()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAddresses');
        return $pluginInfo ? $this->___callPlugins('getAddresses', func_get_args(), $pluginInfo) : parent::getAddresses();
    }

    /**
     * {@inheritdoc}
     */
    public function getStatusHistories()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStatusHistories');
        return $pluginInfo ? $this->___callPlugins('getStatusHistories', func_get_args(), $pluginInfo) : parent::getStatusHistories();
    }

    /**
     * {@inheritdoc}
     */
    public function getExtensionAttributes()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getExtensionAttributes');
        return $pluginInfo ? $this->___callPlugins('getExtensionAttributes', func_get_args(), $pluginInfo) : parent::getExtensionAttributes();
    }

    /**
     * {@inheritdoc}
     */
    public function setExtensionAttributes(\Magento\Sales\Api\Data\OrderExtensionInterface $extensionAttributes)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setExtensionAttributes');
        return $pluginInfo ? $this->___callPlugins('setExtensionAttributes', func_get_args(), $pluginInfo) : parent::setExtensionAttributes($extensionAttributes);
    }

    /**
     * {@inheritdoc}
     */
    public function getAdjustmentNegative()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAdjustmentNegative');
        return $pluginInfo ? $this->___callPlugins('getAdjustmentNegative', func_get_args(), $pluginInfo) : parent::getAdjustmentNegative();
    }

    /**
     * {@inheritdoc}
     */
    public function getAdjustmentPositive()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAdjustmentPositive');
        return $pluginInfo ? $this->___callPlugins('getAdjustmentPositive', func_get_args(), $pluginInfo) : parent::getAdjustmentPositive();
    }

    /**
     * {@inheritdoc}
     */
    public function getAppliedRuleIds()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAppliedRuleIds');
        return $pluginInfo ? $this->___callPlugins('getAppliedRuleIds', func_get_args(), $pluginInfo) : parent::getAppliedRuleIds();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseAdjustmentNegative()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseAdjustmentNegative');
        return $pluginInfo ? $this->___callPlugins('getBaseAdjustmentNegative', func_get_args(), $pluginInfo) : parent::getBaseAdjustmentNegative();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseAdjustmentPositive()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseAdjustmentPositive');
        return $pluginInfo ? $this->___callPlugins('getBaseAdjustmentPositive', func_get_args(), $pluginInfo) : parent::getBaseAdjustmentPositive();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseCurrencyCode()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseCurrencyCode');
        return $pluginInfo ? $this->___callPlugins('getBaseCurrencyCode', func_get_args(), $pluginInfo) : parent::getBaseCurrencyCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseDiscountAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseDiscountAmount');
        return $pluginInfo ? $this->___callPlugins('getBaseDiscountAmount', func_get_args(), $pluginInfo) : parent::getBaseDiscountAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseDiscountCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseDiscountCanceled');
        return $pluginInfo ? $this->___callPlugins('getBaseDiscountCanceled', func_get_args(), $pluginInfo) : parent::getBaseDiscountCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseDiscountInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseDiscountInvoiced');
        return $pluginInfo ? $this->___callPlugins('getBaseDiscountInvoiced', func_get_args(), $pluginInfo) : parent::getBaseDiscountInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseDiscountRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseDiscountRefunded');
        return $pluginInfo ? $this->___callPlugins('getBaseDiscountRefunded', func_get_args(), $pluginInfo) : parent::getBaseDiscountRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseGrandTotal()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseGrandTotal');
        return $pluginInfo ? $this->___callPlugins('getBaseGrandTotal', func_get_args(), $pluginInfo) : parent::getBaseGrandTotal();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseDiscountTaxCompensationAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseDiscountTaxCompensationAmount');
        return $pluginInfo ? $this->___callPlugins('getBaseDiscountTaxCompensationAmount', func_get_args(), $pluginInfo) : parent::getBaseDiscountTaxCompensationAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseDiscountTaxCompensationInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseDiscountTaxCompensationInvoiced');
        return $pluginInfo ? $this->___callPlugins('getBaseDiscountTaxCompensationInvoiced', func_get_args(), $pluginInfo) : parent::getBaseDiscountTaxCompensationInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseDiscountTaxCompensationRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseDiscountTaxCompensationRefunded');
        return $pluginInfo ? $this->___callPlugins('getBaseDiscountTaxCompensationRefunded', func_get_args(), $pluginInfo) : parent::getBaseDiscountTaxCompensationRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseShippingAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseShippingAmount');
        return $pluginInfo ? $this->___callPlugins('getBaseShippingAmount', func_get_args(), $pluginInfo) : parent::getBaseShippingAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseShippingCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseShippingCanceled');
        return $pluginInfo ? $this->___callPlugins('getBaseShippingCanceled', func_get_args(), $pluginInfo) : parent::getBaseShippingCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseShippingDiscountAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseShippingDiscountAmount');
        return $pluginInfo ? $this->___callPlugins('getBaseShippingDiscountAmount', func_get_args(), $pluginInfo) : parent::getBaseShippingDiscountAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseShippingDiscountTaxCompensationAmnt()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseShippingDiscountTaxCompensationAmnt');
        return $pluginInfo ? $this->___callPlugins('getBaseShippingDiscountTaxCompensationAmnt', func_get_args(), $pluginInfo) : parent::getBaseShippingDiscountTaxCompensationAmnt();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseShippingInclTax()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseShippingInclTax');
        return $pluginInfo ? $this->___callPlugins('getBaseShippingInclTax', func_get_args(), $pluginInfo) : parent::getBaseShippingInclTax();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseShippingInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseShippingInvoiced');
        return $pluginInfo ? $this->___callPlugins('getBaseShippingInvoiced', func_get_args(), $pluginInfo) : parent::getBaseShippingInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseShippingRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseShippingRefunded');
        return $pluginInfo ? $this->___callPlugins('getBaseShippingRefunded', func_get_args(), $pluginInfo) : parent::getBaseShippingRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseShippingTaxAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseShippingTaxAmount');
        return $pluginInfo ? $this->___callPlugins('getBaseShippingTaxAmount', func_get_args(), $pluginInfo) : parent::getBaseShippingTaxAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseShippingTaxRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseShippingTaxRefunded');
        return $pluginInfo ? $this->___callPlugins('getBaseShippingTaxRefunded', func_get_args(), $pluginInfo) : parent::getBaseShippingTaxRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseSubtotal()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseSubtotal');
        return $pluginInfo ? $this->___callPlugins('getBaseSubtotal', func_get_args(), $pluginInfo) : parent::getBaseSubtotal();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseSubtotalCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseSubtotalCanceled');
        return $pluginInfo ? $this->___callPlugins('getBaseSubtotalCanceled', func_get_args(), $pluginInfo) : parent::getBaseSubtotalCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseSubtotalInclTax()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseSubtotalInclTax');
        return $pluginInfo ? $this->___callPlugins('getBaseSubtotalInclTax', func_get_args(), $pluginInfo) : parent::getBaseSubtotalInclTax();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseSubtotalInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseSubtotalInvoiced');
        return $pluginInfo ? $this->___callPlugins('getBaseSubtotalInvoiced', func_get_args(), $pluginInfo) : parent::getBaseSubtotalInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseSubtotalRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseSubtotalRefunded');
        return $pluginInfo ? $this->___callPlugins('getBaseSubtotalRefunded', func_get_args(), $pluginInfo) : parent::getBaseSubtotalRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTaxAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTaxAmount');
        return $pluginInfo ? $this->___callPlugins('getBaseTaxAmount', func_get_args(), $pluginInfo) : parent::getBaseTaxAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTaxCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTaxCanceled');
        return $pluginInfo ? $this->___callPlugins('getBaseTaxCanceled', func_get_args(), $pluginInfo) : parent::getBaseTaxCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTaxInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTaxInvoiced');
        return $pluginInfo ? $this->___callPlugins('getBaseTaxInvoiced', func_get_args(), $pluginInfo) : parent::getBaseTaxInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTaxRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTaxRefunded');
        return $pluginInfo ? $this->___callPlugins('getBaseTaxRefunded', func_get_args(), $pluginInfo) : parent::getBaseTaxRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTotalCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTotalCanceled');
        return $pluginInfo ? $this->___callPlugins('getBaseTotalCanceled', func_get_args(), $pluginInfo) : parent::getBaseTotalCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTotalInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTotalInvoiced');
        return $pluginInfo ? $this->___callPlugins('getBaseTotalInvoiced', func_get_args(), $pluginInfo) : parent::getBaseTotalInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTotalInvoicedCost()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTotalInvoicedCost');
        return $pluginInfo ? $this->___callPlugins('getBaseTotalInvoicedCost', func_get_args(), $pluginInfo) : parent::getBaseTotalInvoicedCost();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTotalOfflineRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTotalOfflineRefunded');
        return $pluginInfo ? $this->___callPlugins('getBaseTotalOfflineRefunded', func_get_args(), $pluginInfo) : parent::getBaseTotalOfflineRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTotalOnlineRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTotalOnlineRefunded');
        return $pluginInfo ? $this->___callPlugins('getBaseTotalOnlineRefunded', func_get_args(), $pluginInfo) : parent::getBaseTotalOnlineRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTotalPaid()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTotalPaid');
        return $pluginInfo ? $this->___callPlugins('getBaseTotalPaid', func_get_args(), $pluginInfo) : parent::getBaseTotalPaid();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTotalQtyOrdered()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTotalQtyOrdered');
        return $pluginInfo ? $this->___callPlugins('getBaseTotalQtyOrdered', func_get_args(), $pluginInfo) : parent::getBaseTotalQtyOrdered();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseTotalRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseTotalRefunded');
        return $pluginInfo ? $this->___callPlugins('getBaseTotalRefunded', func_get_args(), $pluginInfo) : parent::getBaseTotalRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseToGlobalRate()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseToGlobalRate');
        return $pluginInfo ? $this->___callPlugins('getBaseToGlobalRate', func_get_args(), $pluginInfo) : parent::getBaseToGlobalRate();
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseToOrderRate()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseToOrderRate');
        return $pluginInfo ? $this->___callPlugins('getBaseToOrderRate', func_get_args(), $pluginInfo) : parent::getBaseToOrderRate();
    }

    /**
     * {@inheritdoc}
     */
    public function getBillingAddressId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBillingAddressId');
        return $pluginInfo ? $this->___callPlugins('getBillingAddressId', func_get_args(), $pluginInfo) : parent::getBillingAddressId();
    }

    /**
     * {@inheritdoc}
     */
    public function getCanShipPartially()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCanShipPartially');
        return $pluginInfo ? $this->___callPlugins('getCanShipPartially', func_get_args(), $pluginInfo) : parent::getCanShipPartially();
    }

    /**
     * {@inheritdoc}
     */
    public function getCanShipPartiallyItem()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCanShipPartiallyItem');
        return $pluginInfo ? $this->___callPlugins('getCanShipPartiallyItem', func_get_args(), $pluginInfo) : parent::getCanShipPartiallyItem();
    }

    /**
     * {@inheritdoc}
     */
    public function getCouponCode()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCouponCode');
        return $pluginInfo ? $this->___callPlugins('getCouponCode', func_get_args(), $pluginInfo) : parent::getCouponCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getCreatedAt()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCreatedAt');
        return $pluginInfo ? $this->___callPlugins('getCreatedAt', func_get_args(), $pluginInfo) : parent::getCreatedAt();
    }

    /**
     * {@inheritdoc}
     */
    public function setCreatedAt($createdAt)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCreatedAt');
        return $pluginInfo ? $this->___callPlugins('setCreatedAt', func_get_args(), $pluginInfo) : parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerDob()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerDob');
        return $pluginInfo ? $this->___callPlugins('getCustomerDob', func_get_args(), $pluginInfo) : parent::getCustomerDob();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerEmail()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerEmail');
        return $pluginInfo ? $this->___callPlugins('getCustomerEmail', func_get_args(), $pluginInfo) : parent::getCustomerEmail();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerFirstname()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerFirstname');
        return $pluginInfo ? $this->___callPlugins('getCustomerFirstname', func_get_args(), $pluginInfo) : parent::getCustomerFirstname();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerGender()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerGender');
        return $pluginInfo ? $this->___callPlugins('getCustomerGender', func_get_args(), $pluginInfo) : parent::getCustomerGender();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerGroupId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerGroupId');
        return $pluginInfo ? $this->___callPlugins('getCustomerGroupId', func_get_args(), $pluginInfo) : parent::getCustomerGroupId();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerId');
        return $pluginInfo ? $this->___callPlugins('getCustomerId', func_get_args(), $pluginInfo) : parent::getCustomerId();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerIsGuest()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerIsGuest');
        return $pluginInfo ? $this->___callPlugins('getCustomerIsGuest', func_get_args(), $pluginInfo) : parent::getCustomerIsGuest();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerLastname()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerLastname');
        return $pluginInfo ? $this->___callPlugins('getCustomerLastname', func_get_args(), $pluginInfo) : parent::getCustomerLastname();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerMiddlename()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerMiddlename');
        return $pluginInfo ? $this->___callPlugins('getCustomerMiddlename', func_get_args(), $pluginInfo) : parent::getCustomerMiddlename();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerNote()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerNote');
        return $pluginInfo ? $this->___callPlugins('getCustomerNote', func_get_args(), $pluginInfo) : parent::getCustomerNote();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerNoteNotify()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerNoteNotify');
        return $pluginInfo ? $this->___callPlugins('getCustomerNoteNotify', func_get_args(), $pluginInfo) : parent::getCustomerNoteNotify();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerPrefix()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerPrefix');
        return $pluginInfo ? $this->___callPlugins('getCustomerPrefix', func_get_args(), $pluginInfo) : parent::getCustomerPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerSuffix()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerSuffix');
        return $pluginInfo ? $this->___callPlugins('getCustomerSuffix', func_get_args(), $pluginInfo) : parent::getCustomerSuffix();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerTaxvat()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerTaxvat');
        return $pluginInfo ? $this->___callPlugins('getCustomerTaxvat', func_get_args(), $pluginInfo) : parent::getCustomerTaxvat();
    }

    /**
     * {@inheritdoc}
     */
    public function getDiscountAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDiscountAmount');
        return $pluginInfo ? $this->___callPlugins('getDiscountAmount', func_get_args(), $pluginInfo) : parent::getDiscountAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getDiscountCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDiscountCanceled');
        return $pluginInfo ? $this->___callPlugins('getDiscountCanceled', func_get_args(), $pluginInfo) : parent::getDiscountCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getDiscountDescription()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDiscountDescription');
        return $pluginInfo ? $this->___callPlugins('getDiscountDescription', func_get_args(), $pluginInfo) : parent::getDiscountDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function getDiscountInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDiscountInvoiced');
        return $pluginInfo ? $this->___callPlugins('getDiscountInvoiced', func_get_args(), $pluginInfo) : parent::getDiscountInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getDiscountRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDiscountRefunded');
        return $pluginInfo ? $this->___callPlugins('getDiscountRefunded', func_get_args(), $pluginInfo) : parent::getDiscountRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getEditIncrement()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEditIncrement');
        return $pluginInfo ? $this->___callPlugins('getEditIncrement', func_get_args(), $pluginInfo) : parent::getEditIncrement();
    }

    /**
     * {@inheritdoc}
     */
    public function getEmailSent()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEmailSent');
        return $pluginInfo ? $this->___callPlugins('getEmailSent', func_get_args(), $pluginInfo) : parent::getEmailSent();
    }

    /**
     * {@inheritdoc}
     */
    public function getExtCustomerId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getExtCustomerId');
        return $pluginInfo ? $this->___callPlugins('getExtCustomerId', func_get_args(), $pluginInfo) : parent::getExtCustomerId();
    }

    /**
     * {@inheritdoc}
     */
    public function getExtOrderId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getExtOrderId');
        return $pluginInfo ? $this->___callPlugins('getExtOrderId', func_get_args(), $pluginInfo) : parent::getExtOrderId();
    }

    /**
     * {@inheritdoc}
     */
    public function getForcedShipmentWithInvoice()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getForcedShipmentWithInvoice');
        return $pluginInfo ? $this->___callPlugins('getForcedShipmentWithInvoice', func_get_args(), $pluginInfo) : parent::getForcedShipmentWithInvoice();
    }

    /**
     * {@inheritdoc}
     */
    public function getGlobalCurrencyCode()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getGlobalCurrencyCode');
        return $pluginInfo ? $this->___callPlugins('getGlobalCurrencyCode', func_get_args(), $pluginInfo) : parent::getGlobalCurrencyCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getGrandTotal()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getGrandTotal');
        return $pluginInfo ? $this->___callPlugins('getGrandTotal', func_get_args(), $pluginInfo) : parent::getGrandTotal();
    }

    /**
     * {@inheritdoc}
     */
    public function getDiscountTaxCompensationAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDiscountTaxCompensationAmount');
        return $pluginInfo ? $this->___callPlugins('getDiscountTaxCompensationAmount', func_get_args(), $pluginInfo) : parent::getDiscountTaxCompensationAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getDiscountTaxCompensationInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDiscountTaxCompensationInvoiced');
        return $pluginInfo ? $this->___callPlugins('getDiscountTaxCompensationInvoiced', func_get_args(), $pluginInfo) : parent::getDiscountTaxCompensationInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getDiscountTaxCompensationRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDiscountTaxCompensationRefunded');
        return $pluginInfo ? $this->___callPlugins('getDiscountTaxCompensationRefunded', func_get_args(), $pluginInfo) : parent::getDiscountTaxCompensationRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getHoldBeforeState()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHoldBeforeState');
        return $pluginInfo ? $this->___callPlugins('getHoldBeforeState', func_get_args(), $pluginInfo) : parent::getHoldBeforeState();
    }

    /**
     * {@inheritdoc}
     */
    public function getHoldBeforeStatus()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHoldBeforeStatus');
        return $pluginInfo ? $this->___callPlugins('getHoldBeforeStatus', func_get_args(), $pluginInfo) : parent::getHoldBeforeStatus();
    }

    /**
     * {@inheritdoc}
     */
    public function getIsVirtual()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getIsVirtual');
        return $pluginInfo ? $this->___callPlugins('getIsVirtual', func_get_args(), $pluginInfo) : parent::getIsVirtual();
    }

    /**
     * {@inheritdoc}
     */
    public function getOrderCurrencyCode()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getOrderCurrencyCode');
        return $pluginInfo ? $this->___callPlugins('getOrderCurrencyCode', func_get_args(), $pluginInfo) : parent::getOrderCurrencyCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getOriginalIncrementId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getOriginalIncrementId');
        return $pluginInfo ? $this->___callPlugins('getOriginalIncrementId', func_get_args(), $pluginInfo) : parent::getOriginalIncrementId();
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentAuthorizationAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPaymentAuthorizationAmount');
        return $pluginInfo ? $this->___callPlugins('getPaymentAuthorizationAmount', func_get_args(), $pluginInfo) : parent::getPaymentAuthorizationAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentAuthExpiration()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPaymentAuthExpiration');
        return $pluginInfo ? $this->___callPlugins('getPaymentAuthExpiration', func_get_args(), $pluginInfo) : parent::getPaymentAuthExpiration();
    }

    /**
     * {@inheritdoc}
     */
    public function getProtectCode()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getProtectCode');
        return $pluginInfo ? $this->___callPlugins('getProtectCode', func_get_args(), $pluginInfo) : parent::getProtectCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getQuoteAddressId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getQuoteAddressId');
        return $pluginInfo ? $this->___callPlugins('getQuoteAddressId', func_get_args(), $pluginInfo) : parent::getQuoteAddressId();
    }

    /**
     * {@inheritdoc}
     */
    public function getQuoteId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getQuoteId');
        return $pluginInfo ? $this->___callPlugins('getQuoteId', func_get_args(), $pluginInfo) : parent::getQuoteId();
    }

    /**
     * {@inheritdoc}
     */
    public function getRelationChildId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRelationChildId');
        return $pluginInfo ? $this->___callPlugins('getRelationChildId', func_get_args(), $pluginInfo) : parent::getRelationChildId();
    }

    /**
     * {@inheritdoc}
     */
    public function getRelationChildRealId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRelationChildRealId');
        return $pluginInfo ? $this->___callPlugins('getRelationChildRealId', func_get_args(), $pluginInfo) : parent::getRelationChildRealId();
    }

    /**
     * {@inheritdoc}
     */
    public function getRelationParentId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRelationParentId');
        return $pluginInfo ? $this->___callPlugins('getRelationParentId', func_get_args(), $pluginInfo) : parent::getRelationParentId();
    }

    /**
     * {@inheritdoc}
     */
    public function getRelationParentRealId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRelationParentRealId');
        return $pluginInfo ? $this->___callPlugins('getRelationParentRealId', func_get_args(), $pluginInfo) : parent::getRelationParentRealId();
    }

    /**
     * {@inheritdoc}
     */
    public function getRemoteIp()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRemoteIp');
        return $pluginInfo ? $this->___callPlugins('getRemoteIp', func_get_args(), $pluginInfo) : parent::getRemoteIp();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingAmount');
        return $pluginInfo ? $this->___callPlugins('getShippingAmount', func_get_args(), $pluginInfo) : parent::getShippingAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingCanceled');
        return $pluginInfo ? $this->___callPlugins('getShippingCanceled', func_get_args(), $pluginInfo) : parent::getShippingCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingDescription()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingDescription');
        return $pluginInfo ? $this->___callPlugins('getShippingDescription', func_get_args(), $pluginInfo) : parent::getShippingDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingDiscountAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingDiscountAmount');
        return $pluginInfo ? $this->___callPlugins('getShippingDiscountAmount', func_get_args(), $pluginInfo) : parent::getShippingDiscountAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingDiscountTaxCompensationAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingDiscountTaxCompensationAmount');
        return $pluginInfo ? $this->___callPlugins('getShippingDiscountTaxCompensationAmount', func_get_args(), $pluginInfo) : parent::getShippingDiscountTaxCompensationAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingInclTax()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingInclTax');
        return $pluginInfo ? $this->___callPlugins('getShippingInclTax', func_get_args(), $pluginInfo) : parent::getShippingInclTax();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingInvoiced');
        return $pluginInfo ? $this->___callPlugins('getShippingInvoiced', func_get_args(), $pluginInfo) : parent::getShippingInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingRefunded');
        return $pluginInfo ? $this->___callPlugins('getShippingRefunded', func_get_args(), $pluginInfo) : parent::getShippingRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingTaxAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingTaxAmount');
        return $pluginInfo ? $this->___callPlugins('getShippingTaxAmount', func_get_args(), $pluginInfo) : parent::getShippingTaxAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingTaxRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingTaxRefunded');
        return $pluginInfo ? $this->___callPlugins('getShippingTaxRefunded', func_get_args(), $pluginInfo) : parent::getShippingTaxRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getState()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getState');
        return $pluginInfo ? $this->___callPlugins('getState', func_get_args(), $pluginInfo) : parent::getState();
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStatus');
        return $pluginInfo ? $this->___callPlugins('getStatus', func_get_args(), $pluginInfo) : parent::getStatus();
    }

    /**
     * {@inheritdoc}
     */
    public function getStoreCurrencyCode()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStoreCurrencyCode');
        return $pluginInfo ? $this->___callPlugins('getStoreCurrencyCode', func_get_args(), $pluginInfo) : parent::getStoreCurrencyCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getStoreId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStoreId');
        return $pluginInfo ? $this->___callPlugins('getStoreId', func_get_args(), $pluginInfo) : parent::getStoreId();
    }

    /**
     * {@inheritdoc}
     */
    public function getStoreName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStoreName');
        return $pluginInfo ? $this->___callPlugins('getStoreName', func_get_args(), $pluginInfo) : parent::getStoreName();
    }

    /**
     * {@inheritdoc}
     */
    public function getStoreToBaseRate()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStoreToBaseRate');
        return $pluginInfo ? $this->___callPlugins('getStoreToBaseRate', func_get_args(), $pluginInfo) : parent::getStoreToBaseRate();
    }

    /**
     * {@inheritdoc}
     */
    public function getStoreToOrderRate()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStoreToOrderRate');
        return $pluginInfo ? $this->___callPlugins('getStoreToOrderRate', func_get_args(), $pluginInfo) : parent::getStoreToOrderRate();
    }

    /**
     * {@inheritdoc}
     */
    public function getSubtotal()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSubtotal');
        return $pluginInfo ? $this->___callPlugins('getSubtotal', func_get_args(), $pluginInfo) : parent::getSubtotal();
    }

    /**
     * {@inheritdoc}
     */
    public function getSubtotalCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSubtotalCanceled');
        return $pluginInfo ? $this->___callPlugins('getSubtotalCanceled', func_get_args(), $pluginInfo) : parent::getSubtotalCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getSubtotalInclTax()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSubtotalInclTax');
        return $pluginInfo ? $this->___callPlugins('getSubtotalInclTax', func_get_args(), $pluginInfo) : parent::getSubtotalInclTax();
    }

    /**
     * {@inheritdoc}
     */
    public function getSubtotalInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSubtotalInvoiced');
        return $pluginInfo ? $this->___callPlugins('getSubtotalInvoiced', func_get_args(), $pluginInfo) : parent::getSubtotalInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getSubtotalRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSubtotalRefunded');
        return $pluginInfo ? $this->___callPlugins('getSubtotalRefunded', func_get_args(), $pluginInfo) : parent::getSubtotalRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getTaxAmount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTaxAmount');
        return $pluginInfo ? $this->___callPlugins('getTaxAmount', func_get_args(), $pluginInfo) : parent::getTaxAmount();
    }

    /**
     * {@inheritdoc}
     */
    public function getTaxCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTaxCanceled');
        return $pluginInfo ? $this->___callPlugins('getTaxCanceled', func_get_args(), $pluginInfo) : parent::getTaxCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getTaxInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTaxInvoiced');
        return $pluginInfo ? $this->___callPlugins('getTaxInvoiced', func_get_args(), $pluginInfo) : parent::getTaxInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getTaxRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTaxRefunded');
        return $pluginInfo ? $this->___callPlugins('getTaxRefunded', func_get_args(), $pluginInfo) : parent::getTaxRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalCanceled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotalCanceled');
        return $pluginInfo ? $this->___callPlugins('getTotalCanceled', func_get_args(), $pluginInfo) : parent::getTotalCanceled();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalInvoiced()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotalInvoiced');
        return $pluginInfo ? $this->___callPlugins('getTotalInvoiced', func_get_args(), $pluginInfo) : parent::getTotalInvoiced();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalItemCount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotalItemCount');
        return $pluginInfo ? $this->___callPlugins('getTotalItemCount', func_get_args(), $pluginInfo) : parent::getTotalItemCount();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalOfflineRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotalOfflineRefunded');
        return $pluginInfo ? $this->___callPlugins('getTotalOfflineRefunded', func_get_args(), $pluginInfo) : parent::getTotalOfflineRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalOnlineRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotalOnlineRefunded');
        return $pluginInfo ? $this->___callPlugins('getTotalOnlineRefunded', func_get_args(), $pluginInfo) : parent::getTotalOnlineRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalPaid()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotalPaid');
        return $pluginInfo ? $this->___callPlugins('getTotalPaid', func_get_args(), $pluginInfo) : parent::getTotalPaid();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalQtyOrdered()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotalQtyOrdered');
        return $pluginInfo ? $this->___callPlugins('getTotalQtyOrdered', func_get_args(), $pluginInfo) : parent::getTotalQtyOrdered();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotalRefunded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotalRefunded');
        return $pluginInfo ? $this->___callPlugins('getTotalRefunded', func_get_args(), $pluginInfo) : parent::getTotalRefunded();
    }

    /**
     * {@inheritdoc}
     */
    public function getUpdatedAt()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUpdatedAt');
        return $pluginInfo ? $this->___callPlugins('getUpdatedAt', func_get_args(), $pluginInfo) : parent::getUpdatedAt();
    }

    /**
     * {@inheritdoc}
     */
    public function getWeight()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getWeight');
        return $pluginInfo ? $this->___callPlugins('getWeight', func_get_args(), $pluginInfo) : parent::getWeight();
    }

    /**
     * {@inheritdoc}
     */
    public function getXForwardedFor()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getXForwardedFor');
        return $pluginInfo ? $this->___callPlugins('getXForwardedFor', func_get_args(), $pluginInfo) : parent::getXForwardedFor();
    }

    /**
     * {@inheritdoc}
     */
    public function setStatusHistories(?array $statusHistories = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStatusHistories');
        return $pluginInfo ? $this->___callPlugins('setStatusHistories', func_get_args(), $pluginInfo) : parent::setStatusHistories($statusHistories);
    }

    /**
     * {@inheritdoc}
     */
    public function setStatus($status)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStatus');
        return $pluginInfo ? $this->___callPlugins('setStatus', func_get_args(), $pluginInfo) : parent::setStatus($status);
    }

    /**
     * {@inheritdoc}
     */
    public function setCouponCode($code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCouponCode');
        return $pluginInfo ? $this->___callPlugins('setCouponCode', func_get_args(), $pluginInfo) : parent::setCouponCode($code);
    }

    /**
     * {@inheritdoc}
     */
    public function setProtectCode($code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setProtectCode');
        return $pluginInfo ? $this->___callPlugins('setProtectCode', func_get_args(), $pluginInfo) : parent::setProtectCode($code);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingDescription($description)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingDescription');
        return $pluginInfo ? $this->___callPlugins('setShippingDescription', func_get_args(), $pluginInfo) : parent::setShippingDescription($description);
    }

    /**
     * {@inheritdoc}
     */
    public function setIsVirtual($isVirtual)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setIsVirtual');
        return $pluginInfo ? $this->___callPlugins('setIsVirtual', func_get_args(), $pluginInfo) : parent::setIsVirtual($isVirtual);
    }

    /**
     * {@inheritdoc}
     */
    public function setStoreId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStoreId');
        return $pluginInfo ? $this->___callPlugins('setStoreId', func_get_args(), $pluginInfo) : parent::setStoreId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerId');
        return $pluginInfo ? $this->___callPlugins('setCustomerId', func_get_args(), $pluginInfo) : parent::setCustomerId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseDiscountAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseDiscountAmount');
        return $pluginInfo ? $this->___callPlugins('setBaseDiscountAmount', func_get_args(), $pluginInfo) : parent::setBaseDiscountAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseDiscountCanceled($baseDiscountCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseDiscountCanceled');
        return $pluginInfo ? $this->___callPlugins('setBaseDiscountCanceled', func_get_args(), $pluginInfo) : parent::setBaseDiscountCanceled($baseDiscountCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseDiscountInvoiced($baseDiscountInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseDiscountInvoiced');
        return $pluginInfo ? $this->___callPlugins('setBaseDiscountInvoiced', func_get_args(), $pluginInfo) : parent::setBaseDiscountInvoiced($baseDiscountInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseDiscountRefunded($baseDiscountRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseDiscountRefunded');
        return $pluginInfo ? $this->___callPlugins('setBaseDiscountRefunded', func_get_args(), $pluginInfo) : parent::setBaseDiscountRefunded($baseDiscountRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseGrandTotal($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseGrandTotal');
        return $pluginInfo ? $this->___callPlugins('setBaseGrandTotal', func_get_args(), $pluginInfo) : parent::setBaseGrandTotal($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseShippingAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseShippingAmount');
        return $pluginInfo ? $this->___callPlugins('setBaseShippingAmount', func_get_args(), $pluginInfo) : parent::setBaseShippingAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseShippingCanceled($baseShippingCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseShippingCanceled');
        return $pluginInfo ? $this->___callPlugins('setBaseShippingCanceled', func_get_args(), $pluginInfo) : parent::setBaseShippingCanceled($baseShippingCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseShippingInvoiced($baseShippingInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseShippingInvoiced');
        return $pluginInfo ? $this->___callPlugins('setBaseShippingInvoiced', func_get_args(), $pluginInfo) : parent::setBaseShippingInvoiced($baseShippingInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseShippingRefunded($baseShippingRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseShippingRefunded');
        return $pluginInfo ? $this->___callPlugins('setBaseShippingRefunded', func_get_args(), $pluginInfo) : parent::setBaseShippingRefunded($baseShippingRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseShippingTaxAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseShippingTaxAmount');
        return $pluginInfo ? $this->___callPlugins('setBaseShippingTaxAmount', func_get_args(), $pluginInfo) : parent::setBaseShippingTaxAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseShippingTaxRefunded($baseShippingTaxRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseShippingTaxRefunded');
        return $pluginInfo ? $this->___callPlugins('setBaseShippingTaxRefunded', func_get_args(), $pluginInfo) : parent::setBaseShippingTaxRefunded($baseShippingTaxRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseSubtotal($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseSubtotal');
        return $pluginInfo ? $this->___callPlugins('setBaseSubtotal', func_get_args(), $pluginInfo) : parent::setBaseSubtotal($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseSubtotalCanceled($baseSubtotalCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseSubtotalCanceled');
        return $pluginInfo ? $this->___callPlugins('setBaseSubtotalCanceled', func_get_args(), $pluginInfo) : parent::setBaseSubtotalCanceled($baseSubtotalCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseSubtotalInvoiced($baseSubtotalInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseSubtotalInvoiced');
        return $pluginInfo ? $this->___callPlugins('setBaseSubtotalInvoiced', func_get_args(), $pluginInfo) : parent::setBaseSubtotalInvoiced($baseSubtotalInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseSubtotalRefunded($baseSubtotalRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseSubtotalRefunded');
        return $pluginInfo ? $this->___callPlugins('setBaseSubtotalRefunded', func_get_args(), $pluginInfo) : parent::setBaseSubtotalRefunded($baseSubtotalRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTaxAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTaxAmount');
        return $pluginInfo ? $this->___callPlugins('setBaseTaxAmount', func_get_args(), $pluginInfo) : parent::setBaseTaxAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTaxCanceled($baseTaxCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTaxCanceled');
        return $pluginInfo ? $this->___callPlugins('setBaseTaxCanceled', func_get_args(), $pluginInfo) : parent::setBaseTaxCanceled($baseTaxCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTaxInvoiced($baseTaxInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTaxInvoiced');
        return $pluginInfo ? $this->___callPlugins('setBaseTaxInvoiced', func_get_args(), $pluginInfo) : parent::setBaseTaxInvoiced($baseTaxInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTaxRefunded($baseTaxRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTaxRefunded');
        return $pluginInfo ? $this->___callPlugins('setBaseTaxRefunded', func_get_args(), $pluginInfo) : parent::setBaseTaxRefunded($baseTaxRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseToGlobalRate($rate)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseToGlobalRate');
        return $pluginInfo ? $this->___callPlugins('setBaseToGlobalRate', func_get_args(), $pluginInfo) : parent::setBaseToGlobalRate($rate);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseToOrderRate($rate)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseToOrderRate');
        return $pluginInfo ? $this->___callPlugins('setBaseToOrderRate', func_get_args(), $pluginInfo) : parent::setBaseToOrderRate($rate);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTotalCanceled($baseTotalCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTotalCanceled');
        return $pluginInfo ? $this->___callPlugins('setBaseTotalCanceled', func_get_args(), $pluginInfo) : parent::setBaseTotalCanceled($baseTotalCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTotalInvoiced($baseTotalInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTotalInvoiced');
        return $pluginInfo ? $this->___callPlugins('setBaseTotalInvoiced', func_get_args(), $pluginInfo) : parent::setBaseTotalInvoiced($baseTotalInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTotalInvoicedCost($baseTotalInvoicedCost)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTotalInvoicedCost');
        return $pluginInfo ? $this->___callPlugins('setBaseTotalInvoicedCost', func_get_args(), $pluginInfo) : parent::setBaseTotalInvoicedCost($baseTotalInvoicedCost);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTotalOfflineRefunded($baseTotalOfflineRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTotalOfflineRefunded');
        return $pluginInfo ? $this->___callPlugins('setBaseTotalOfflineRefunded', func_get_args(), $pluginInfo) : parent::setBaseTotalOfflineRefunded($baseTotalOfflineRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTotalOnlineRefunded($baseTotalOnlineRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTotalOnlineRefunded');
        return $pluginInfo ? $this->___callPlugins('setBaseTotalOnlineRefunded', func_get_args(), $pluginInfo) : parent::setBaseTotalOnlineRefunded($baseTotalOnlineRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTotalPaid($baseTotalPaid)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTotalPaid');
        return $pluginInfo ? $this->___callPlugins('setBaseTotalPaid', func_get_args(), $pluginInfo) : parent::setBaseTotalPaid($baseTotalPaid);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTotalQtyOrdered($baseTotalQtyOrdered)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTotalQtyOrdered');
        return $pluginInfo ? $this->___callPlugins('setBaseTotalQtyOrdered', func_get_args(), $pluginInfo) : parent::setBaseTotalQtyOrdered($baseTotalQtyOrdered);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTotalRefunded($baseTotalRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTotalRefunded');
        return $pluginInfo ? $this->___callPlugins('setBaseTotalRefunded', func_get_args(), $pluginInfo) : parent::setBaseTotalRefunded($baseTotalRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setDiscountAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDiscountAmount');
        return $pluginInfo ? $this->___callPlugins('setDiscountAmount', func_get_args(), $pluginInfo) : parent::setDiscountAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setDiscountCanceled($discountCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDiscountCanceled');
        return $pluginInfo ? $this->___callPlugins('setDiscountCanceled', func_get_args(), $pluginInfo) : parent::setDiscountCanceled($discountCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setDiscountInvoiced($discountInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDiscountInvoiced');
        return $pluginInfo ? $this->___callPlugins('setDiscountInvoiced', func_get_args(), $pluginInfo) : parent::setDiscountInvoiced($discountInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setDiscountRefunded($discountRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDiscountRefunded');
        return $pluginInfo ? $this->___callPlugins('setDiscountRefunded', func_get_args(), $pluginInfo) : parent::setDiscountRefunded($discountRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setGrandTotal($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setGrandTotal');
        return $pluginInfo ? $this->___callPlugins('setGrandTotal', func_get_args(), $pluginInfo) : parent::setGrandTotal($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingAmount');
        return $pluginInfo ? $this->___callPlugins('setShippingAmount', func_get_args(), $pluginInfo) : parent::setShippingAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingCanceled($shippingCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingCanceled');
        return $pluginInfo ? $this->___callPlugins('setShippingCanceled', func_get_args(), $pluginInfo) : parent::setShippingCanceled($shippingCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingInvoiced($shippingInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingInvoiced');
        return $pluginInfo ? $this->___callPlugins('setShippingInvoiced', func_get_args(), $pluginInfo) : parent::setShippingInvoiced($shippingInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingRefunded($shippingRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingRefunded');
        return $pluginInfo ? $this->___callPlugins('setShippingRefunded', func_get_args(), $pluginInfo) : parent::setShippingRefunded($shippingRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingTaxAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingTaxAmount');
        return $pluginInfo ? $this->___callPlugins('setShippingTaxAmount', func_get_args(), $pluginInfo) : parent::setShippingTaxAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingTaxRefunded($shippingTaxRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingTaxRefunded');
        return $pluginInfo ? $this->___callPlugins('setShippingTaxRefunded', func_get_args(), $pluginInfo) : parent::setShippingTaxRefunded($shippingTaxRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setStoreToBaseRate($rate)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStoreToBaseRate');
        return $pluginInfo ? $this->___callPlugins('setStoreToBaseRate', func_get_args(), $pluginInfo) : parent::setStoreToBaseRate($rate);
    }

    /**
     * {@inheritdoc}
     */
    public function setStoreToOrderRate($rate)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStoreToOrderRate');
        return $pluginInfo ? $this->___callPlugins('setStoreToOrderRate', func_get_args(), $pluginInfo) : parent::setStoreToOrderRate($rate);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubtotal($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setSubtotal');
        return $pluginInfo ? $this->___callPlugins('setSubtotal', func_get_args(), $pluginInfo) : parent::setSubtotal($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubtotalCanceled($subtotalCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setSubtotalCanceled');
        return $pluginInfo ? $this->___callPlugins('setSubtotalCanceled', func_get_args(), $pluginInfo) : parent::setSubtotalCanceled($subtotalCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubtotalInvoiced($subtotalInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setSubtotalInvoiced');
        return $pluginInfo ? $this->___callPlugins('setSubtotalInvoiced', func_get_args(), $pluginInfo) : parent::setSubtotalInvoiced($subtotalInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubtotalRefunded($subtotalRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setSubtotalRefunded');
        return $pluginInfo ? $this->___callPlugins('setSubtotalRefunded', func_get_args(), $pluginInfo) : parent::setSubtotalRefunded($subtotalRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setTaxAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTaxAmount');
        return $pluginInfo ? $this->___callPlugins('setTaxAmount', func_get_args(), $pluginInfo) : parent::setTaxAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setTaxCanceled($taxCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTaxCanceled');
        return $pluginInfo ? $this->___callPlugins('setTaxCanceled', func_get_args(), $pluginInfo) : parent::setTaxCanceled($taxCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setTaxInvoiced($taxInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTaxInvoiced');
        return $pluginInfo ? $this->___callPlugins('setTaxInvoiced', func_get_args(), $pluginInfo) : parent::setTaxInvoiced($taxInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setTaxRefunded($taxRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTaxRefunded');
        return $pluginInfo ? $this->___callPlugins('setTaxRefunded', func_get_args(), $pluginInfo) : parent::setTaxRefunded($taxRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalCanceled($totalCanceled)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTotalCanceled');
        return $pluginInfo ? $this->___callPlugins('setTotalCanceled', func_get_args(), $pluginInfo) : parent::setTotalCanceled($totalCanceled);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalInvoiced($totalInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTotalInvoiced');
        return $pluginInfo ? $this->___callPlugins('setTotalInvoiced', func_get_args(), $pluginInfo) : parent::setTotalInvoiced($totalInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalOfflineRefunded($totalOfflineRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTotalOfflineRefunded');
        return $pluginInfo ? $this->___callPlugins('setTotalOfflineRefunded', func_get_args(), $pluginInfo) : parent::setTotalOfflineRefunded($totalOfflineRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalOnlineRefunded($totalOnlineRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTotalOnlineRefunded');
        return $pluginInfo ? $this->___callPlugins('setTotalOnlineRefunded', func_get_args(), $pluginInfo) : parent::setTotalOnlineRefunded($totalOnlineRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalPaid($totalPaid)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTotalPaid');
        return $pluginInfo ? $this->___callPlugins('setTotalPaid', func_get_args(), $pluginInfo) : parent::setTotalPaid($totalPaid);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalQtyOrdered($totalQtyOrdered)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTotalQtyOrdered');
        return $pluginInfo ? $this->___callPlugins('setTotalQtyOrdered', func_get_args(), $pluginInfo) : parent::setTotalQtyOrdered($totalQtyOrdered);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalRefunded($totalRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTotalRefunded');
        return $pluginInfo ? $this->___callPlugins('setTotalRefunded', func_get_args(), $pluginInfo) : parent::setTotalRefunded($totalRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setCanShipPartially($flag)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCanShipPartially');
        return $pluginInfo ? $this->___callPlugins('setCanShipPartially', func_get_args(), $pluginInfo) : parent::setCanShipPartially($flag);
    }

    /**
     * {@inheritdoc}
     */
    public function setCanShipPartiallyItem($flag)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCanShipPartiallyItem');
        return $pluginInfo ? $this->___callPlugins('setCanShipPartiallyItem', func_get_args(), $pluginInfo) : parent::setCanShipPartiallyItem($flag);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerIsGuest($customerIsGuest)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerIsGuest');
        return $pluginInfo ? $this->___callPlugins('setCustomerIsGuest', func_get_args(), $pluginInfo) : parent::setCustomerIsGuest($customerIsGuest);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerNoteNotify($customerNoteNotify)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerNoteNotify');
        return $pluginInfo ? $this->___callPlugins('setCustomerNoteNotify', func_get_args(), $pluginInfo) : parent::setCustomerNoteNotify($customerNoteNotify);
    }

    /**
     * {@inheritdoc}
     */
    public function setBillingAddressId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBillingAddressId');
        return $pluginInfo ? $this->___callPlugins('setBillingAddressId', func_get_args(), $pluginInfo) : parent::setBillingAddressId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerGroupId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerGroupId');
        return $pluginInfo ? $this->___callPlugins('setCustomerGroupId', func_get_args(), $pluginInfo) : parent::setCustomerGroupId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setEditIncrement($editIncrement)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setEditIncrement');
        return $pluginInfo ? $this->___callPlugins('setEditIncrement', func_get_args(), $pluginInfo) : parent::setEditIncrement($editIncrement);
    }

    /**
     * {@inheritdoc}
     */
    public function setEmailSent($emailSent)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setEmailSent');
        return $pluginInfo ? $this->___callPlugins('setEmailSent', func_get_args(), $pluginInfo) : parent::setEmailSent($emailSent);
    }

    /**
     * {@inheritdoc}
     */
    public function setForcedShipmentWithInvoice($forcedShipmentWithInvoice)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setForcedShipmentWithInvoice');
        return $pluginInfo ? $this->___callPlugins('setForcedShipmentWithInvoice', func_get_args(), $pluginInfo) : parent::setForcedShipmentWithInvoice($forcedShipmentWithInvoice);
    }

    /**
     * {@inheritdoc}
     */
    public function setPaymentAuthExpiration($paymentAuthExpiration)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setPaymentAuthExpiration');
        return $pluginInfo ? $this->___callPlugins('setPaymentAuthExpiration', func_get_args(), $pluginInfo) : parent::setPaymentAuthExpiration($paymentAuthExpiration);
    }

    /**
     * {@inheritdoc}
     */
    public function setQuoteAddressId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setQuoteAddressId');
        return $pluginInfo ? $this->___callPlugins('setQuoteAddressId', func_get_args(), $pluginInfo) : parent::setQuoteAddressId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setQuoteId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setQuoteId');
        return $pluginInfo ? $this->___callPlugins('setQuoteId', func_get_args(), $pluginInfo) : parent::setQuoteId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setAdjustmentNegative($adjustmentNegative)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAdjustmentNegative');
        return $pluginInfo ? $this->___callPlugins('setAdjustmentNegative', func_get_args(), $pluginInfo) : parent::setAdjustmentNegative($adjustmentNegative);
    }

    /**
     * {@inheritdoc}
     */
    public function setAdjustmentPositive($adjustmentPositive)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAdjustmentPositive');
        return $pluginInfo ? $this->___callPlugins('setAdjustmentPositive', func_get_args(), $pluginInfo) : parent::setAdjustmentPositive($adjustmentPositive);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseAdjustmentNegative($baseAdjustmentNegative)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseAdjustmentNegative');
        return $pluginInfo ? $this->___callPlugins('setBaseAdjustmentNegative', func_get_args(), $pluginInfo) : parent::setBaseAdjustmentNegative($baseAdjustmentNegative);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseAdjustmentPositive($baseAdjustmentPositive)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseAdjustmentPositive');
        return $pluginInfo ? $this->___callPlugins('setBaseAdjustmentPositive', func_get_args(), $pluginInfo) : parent::setBaseAdjustmentPositive($baseAdjustmentPositive);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseShippingDiscountAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseShippingDiscountAmount');
        return $pluginInfo ? $this->___callPlugins('setBaseShippingDiscountAmount', func_get_args(), $pluginInfo) : parent::setBaseShippingDiscountAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseSubtotalInclTax($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseSubtotalInclTax');
        return $pluginInfo ? $this->___callPlugins('setBaseSubtotalInclTax', func_get_args(), $pluginInfo) : parent::setBaseSubtotalInclTax($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseTotalDue($baseTotalDue)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseTotalDue');
        return $pluginInfo ? $this->___callPlugins('setBaseTotalDue', func_get_args(), $pluginInfo) : parent::setBaseTotalDue($baseTotalDue);
    }

    /**
     * {@inheritdoc}
     */
    public function setPaymentAuthorizationAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setPaymentAuthorizationAmount');
        return $pluginInfo ? $this->___callPlugins('setPaymentAuthorizationAmount', func_get_args(), $pluginInfo) : parent::setPaymentAuthorizationAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingDiscountAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingDiscountAmount');
        return $pluginInfo ? $this->___callPlugins('setShippingDiscountAmount', func_get_args(), $pluginInfo) : parent::setShippingDiscountAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setSubtotalInclTax($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setSubtotalInclTax');
        return $pluginInfo ? $this->___callPlugins('setSubtotalInclTax', func_get_args(), $pluginInfo) : parent::setSubtotalInclTax($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalDue($totalDue)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTotalDue');
        return $pluginInfo ? $this->___callPlugins('setTotalDue', func_get_args(), $pluginInfo) : parent::setTotalDue($totalDue);
    }

    /**
     * {@inheritdoc}
     */
    public function setWeight($weight)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setWeight');
        return $pluginInfo ? $this->___callPlugins('setWeight', func_get_args(), $pluginInfo) : parent::setWeight($weight);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerDob($customerDob)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerDob');
        return $pluginInfo ? $this->___callPlugins('setCustomerDob', func_get_args(), $pluginInfo) : parent::setCustomerDob($customerDob);
    }

    /**
     * {@inheritdoc}
     */
    public function setIncrementId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setIncrementId');
        return $pluginInfo ? $this->___callPlugins('setIncrementId', func_get_args(), $pluginInfo) : parent::setIncrementId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setAppliedRuleIds($appliedRuleIds)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAppliedRuleIds');
        return $pluginInfo ? $this->___callPlugins('setAppliedRuleIds', func_get_args(), $pluginInfo) : parent::setAppliedRuleIds($appliedRuleIds);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseCurrencyCode($code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseCurrencyCode');
        return $pluginInfo ? $this->___callPlugins('setBaseCurrencyCode', func_get_args(), $pluginInfo) : parent::setBaseCurrencyCode($code);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerEmail($customerEmail)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerEmail');
        return $pluginInfo ? $this->___callPlugins('setCustomerEmail', func_get_args(), $pluginInfo) : parent::setCustomerEmail($customerEmail);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerFirstname($customerFirstname)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerFirstname');
        return $pluginInfo ? $this->___callPlugins('setCustomerFirstname', func_get_args(), $pluginInfo) : parent::setCustomerFirstname($customerFirstname);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerLastname($customerLastname)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerLastname');
        return $pluginInfo ? $this->___callPlugins('setCustomerLastname', func_get_args(), $pluginInfo) : parent::setCustomerLastname($customerLastname);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerMiddlename($customerMiddlename)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerMiddlename');
        return $pluginInfo ? $this->___callPlugins('setCustomerMiddlename', func_get_args(), $pluginInfo) : parent::setCustomerMiddlename($customerMiddlename);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerPrefix($customerPrefix)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerPrefix');
        return $pluginInfo ? $this->___callPlugins('setCustomerPrefix', func_get_args(), $pluginInfo) : parent::setCustomerPrefix($customerPrefix);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerSuffix($customerSuffix)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerSuffix');
        return $pluginInfo ? $this->___callPlugins('setCustomerSuffix', func_get_args(), $pluginInfo) : parent::setCustomerSuffix($customerSuffix);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerTaxvat($customerTaxvat)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerTaxvat');
        return $pluginInfo ? $this->___callPlugins('setCustomerTaxvat', func_get_args(), $pluginInfo) : parent::setCustomerTaxvat($customerTaxvat);
    }

    /**
     * {@inheritdoc}
     */
    public function setDiscountDescription($description)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDiscountDescription');
        return $pluginInfo ? $this->___callPlugins('setDiscountDescription', func_get_args(), $pluginInfo) : parent::setDiscountDescription($description);
    }

    /**
     * {@inheritdoc}
     */
    public function setExtCustomerId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setExtCustomerId');
        return $pluginInfo ? $this->___callPlugins('setExtCustomerId', func_get_args(), $pluginInfo) : parent::setExtCustomerId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setExtOrderId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setExtOrderId');
        return $pluginInfo ? $this->___callPlugins('setExtOrderId', func_get_args(), $pluginInfo) : parent::setExtOrderId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setGlobalCurrencyCode($code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setGlobalCurrencyCode');
        return $pluginInfo ? $this->___callPlugins('setGlobalCurrencyCode', func_get_args(), $pluginInfo) : parent::setGlobalCurrencyCode($code);
    }

    /**
     * {@inheritdoc}
     */
    public function setHoldBeforeState($holdBeforeState)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHoldBeforeState');
        return $pluginInfo ? $this->___callPlugins('setHoldBeforeState', func_get_args(), $pluginInfo) : parent::setHoldBeforeState($holdBeforeState);
    }

    /**
     * {@inheritdoc}
     */
    public function setHoldBeforeStatus($holdBeforeStatus)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHoldBeforeStatus');
        return $pluginInfo ? $this->___callPlugins('setHoldBeforeStatus', func_get_args(), $pluginInfo) : parent::setHoldBeforeStatus($holdBeforeStatus);
    }

    /**
     * {@inheritdoc}
     */
    public function setOrderCurrencyCode($code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setOrderCurrencyCode');
        return $pluginInfo ? $this->___callPlugins('setOrderCurrencyCode', func_get_args(), $pluginInfo) : parent::setOrderCurrencyCode($code);
    }

    /**
     * {@inheritdoc}
     */
    public function setOriginalIncrementId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setOriginalIncrementId');
        return $pluginInfo ? $this->___callPlugins('setOriginalIncrementId', func_get_args(), $pluginInfo) : parent::setOriginalIncrementId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setRelationChildId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setRelationChildId');
        return $pluginInfo ? $this->___callPlugins('setRelationChildId', func_get_args(), $pluginInfo) : parent::setRelationChildId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setRelationChildRealId($realId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setRelationChildRealId');
        return $pluginInfo ? $this->___callPlugins('setRelationChildRealId', func_get_args(), $pluginInfo) : parent::setRelationChildRealId($realId);
    }

    /**
     * {@inheritdoc}
     */
    public function setRelationParentId($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setRelationParentId');
        return $pluginInfo ? $this->___callPlugins('setRelationParentId', func_get_args(), $pluginInfo) : parent::setRelationParentId($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setRelationParentRealId($realId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setRelationParentRealId');
        return $pluginInfo ? $this->___callPlugins('setRelationParentRealId', func_get_args(), $pluginInfo) : parent::setRelationParentRealId($realId);
    }

    /**
     * {@inheritdoc}
     */
    public function setRemoteIp($remoteIp)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setRemoteIp');
        return $pluginInfo ? $this->___callPlugins('setRemoteIp', func_get_args(), $pluginInfo) : parent::setRemoteIp($remoteIp);
    }

    /**
     * {@inheritdoc}
     */
    public function setStoreCurrencyCode($code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStoreCurrencyCode');
        return $pluginInfo ? $this->___callPlugins('setStoreCurrencyCode', func_get_args(), $pluginInfo) : parent::setStoreCurrencyCode($code);
    }

    /**
     * {@inheritdoc}
     */
    public function setStoreName($storeName)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStoreName');
        return $pluginInfo ? $this->___callPlugins('setStoreName', func_get_args(), $pluginInfo) : parent::setStoreName($storeName);
    }

    /**
     * {@inheritdoc}
     */
    public function setXForwardedFor($xForwardedFor)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setXForwardedFor');
        return $pluginInfo ? $this->___callPlugins('setXForwardedFor', func_get_args(), $pluginInfo) : parent::setXForwardedFor($xForwardedFor);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerNote($customerNote)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerNote');
        return $pluginInfo ? $this->___callPlugins('setCustomerNote', func_get_args(), $pluginInfo) : parent::setCustomerNote($customerNote);
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt($timestamp)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setUpdatedAt');
        return $pluginInfo ? $this->___callPlugins('setUpdatedAt', func_get_args(), $pluginInfo) : parent::setUpdatedAt($timestamp);
    }

    /**
     * {@inheritdoc}
     */
    public function setTotalItemCount($totalItemCount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTotalItemCount');
        return $pluginInfo ? $this->___callPlugins('setTotalItemCount', func_get_args(), $pluginInfo) : parent::setTotalItemCount($totalItemCount);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerGender($customerGender)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerGender');
        return $pluginInfo ? $this->___callPlugins('setCustomerGender', func_get_args(), $pluginInfo) : parent::setCustomerGender($customerGender);
    }

    /**
     * {@inheritdoc}
     */
    public function setDiscountTaxCompensationAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDiscountTaxCompensationAmount');
        return $pluginInfo ? $this->___callPlugins('setDiscountTaxCompensationAmount', func_get_args(), $pluginInfo) : parent::setDiscountTaxCompensationAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseDiscountTaxCompensationAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseDiscountTaxCompensationAmount');
        return $pluginInfo ? $this->___callPlugins('setBaseDiscountTaxCompensationAmount', func_get_args(), $pluginInfo) : parent::setBaseDiscountTaxCompensationAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingDiscountTaxCompensationAmount($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingDiscountTaxCompensationAmount');
        return $pluginInfo ? $this->___callPlugins('setShippingDiscountTaxCompensationAmount', func_get_args(), $pluginInfo) : parent::setShippingDiscountTaxCompensationAmount($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseShippingDiscountTaxCompensationAmnt($amnt)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseShippingDiscountTaxCompensationAmnt');
        return $pluginInfo ? $this->___callPlugins('setBaseShippingDiscountTaxCompensationAmnt', func_get_args(), $pluginInfo) : parent::setBaseShippingDiscountTaxCompensationAmnt($amnt);
    }

    /**
     * {@inheritdoc}
     */
    public function setDiscountTaxCompensationInvoiced($discountTaxCompensationInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDiscountTaxCompensationInvoiced');
        return $pluginInfo ? $this->___callPlugins('setDiscountTaxCompensationInvoiced', func_get_args(), $pluginInfo) : parent::setDiscountTaxCompensationInvoiced($discountTaxCompensationInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseDiscountTaxCompensationInvoiced($baseDiscountTaxCompensationInvoiced)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseDiscountTaxCompensationInvoiced');
        return $pluginInfo ? $this->___callPlugins('setBaseDiscountTaxCompensationInvoiced', func_get_args(), $pluginInfo) : parent::setBaseDiscountTaxCompensationInvoiced($baseDiscountTaxCompensationInvoiced);
    }

    /**
     * {@inheritdoc}
     */
    public function setDiscountTaxCompensationRefunded($discountTaxCompensationRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDiscountTaxCompensationRefunded');
        return $pluginInfo ? $this->___callPlugins('setDiscountTaxCompensationRefunded', func_get_args(), $pluginInfo) : parent::setDiscountTaxCompensationRefunded($discountTaxCompensationRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseDiscountTaxCompensationRefunded($baseDiscountTaxCompensationRefunded)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseDiscountTaxCompensationRefunded');
        return $pluginInfo ? $this->___callPlugins('setBaseDiscountTaxCompensationRefunded', func_get_args(), $pluginInfo) : parent::setBaseDiscountTaxCompensationRefunded($baseDiscountTaxCompensationRefunded);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingInclTax($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingInclTax');
        return $pluginInfo ? $this->___callPlugins('setShippingInclTax', func_get_args(), $pluginInfo) : parent::setShippingInclTax($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setBaseShippingInclTax($amount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBaseShippingInclTax');
        return $pluginInfo ? $this->___callPlugins('setBaseShippingInclTax', func_get_args(), $pluginInfo) : parent::setBaseShippingInclTax($amount);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingMethod($shippingMethod)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingMethod');
        return $pluginInfo ? $this->___callPlugins('setShippingMethod', func_get_args(), $pluginInfo) : parent::setShippingMethod($shippingMethod);
    }

    /**
     * {@inheritdoc}
     */
    public function getEventObject()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEventObject');
        return $pluginInfo ? $this->___callPlugins('getEventObject', func_get_args(), $pluginInfo) : parent::getEventObject();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomAttributes()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomAttributes');
        return $pluginInfo ? $this->___callPlugins('getCustomAttributes', func_get_args(), $pluginInfo) : parent::getCustomAttributes();
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomAttribute($attributeCode)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomAttribute');
        return $pluginInfo ? $this->___callPlugins('getCustomAttribute', func_get_args(), $pluginInfo) : parent::getCustomAttribute($attributeCode);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomAttributes(array $attributes)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomAttributes');
        return $pluginInfo ? $this->___callPlugins('setCustomAttributes', func_get_args(), $pluginInfo) : parent::setCustomAttributes($attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomAttribute($attributeCode, $attributeValue)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomAttribute');
        return $pluginInfo ? $this->___callPlugins('setCustomAttribute', func_get_args(), $pluginInfo) : parent::setCustomAttribute($attributeCode, $attributeValue);
    }

    /**
     * {@inheritdoc}
     */
    public function setData($key, $value = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setData');
        return $pluginInfo ? $this->___callPlugins('setData', func_get_args(), $pluginInfo) : parent::setData($key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function setId($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setId');
        return $pluginInfo ? $this->___callPlugins('setId', func_get_args(), $pluginInfo) : parent::setId($value);
    }

    /**
     * {@inheritdoc}
     */
    public function setIdFieldName($name)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setIdFieldName');
        return $pluginInfo ? $this->___callPlugins('setIdFieldName', func_get_args(), $pluginInfo) : parent::setIdFieldName($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getIdFieldName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getIdFieldName');
        return $pluginInfo ? $this->___callPlugins('getIdFieldName', func_get_args(), $pluginInfo) : parent::getIdFieldName();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getId');
        return $pluginInfo ? $this->___callPlugins('getId', func_get_args(), $pluginInfo) : parent::getId();
    }

    /**
     * {@inheritdoc}
     */
    public function isDeleted($isDeleted = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isDeleted');
        return $pluginInfo ? $this->___callPlugins('isDeleted', func_get_args(), $pluginInfo) : parent::isDeleted($isDeleted);
    }

    /**
     * {@inheritdoc}
     */
    public function hasDataChanges()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasDataChanges');
        return $pluginInfo ? $this->___callPlugins('hasDataChanges', func_get_args(), $pluginInfo) : parent::hasDataChanges();
    }

    /**
     * {@inheritdoc}
     */
    public function setDataChanges($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDataChanges');
        return $pluginInfo ? $this->___callPlugins('setDataChanges', func_get_args(), $pluginInfo) : parent::setDataChanges($value);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrigData($key = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getOrigData');
        return $pluginInfo ? $this->___callPlugins('getOrigData', func_get_args(), $pluginInfo) : parent::getOrigData($key);
    }

    /**
     * {@inheritdoc}
     */
    public function setOrigData($key = null, $data = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setOrigData');
        return $pluginInfo ? $this->___callPlugins('setOrigData', func_get_args(), $pluginInfo) : parent::setOrigData($key, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function dataHasChangedFor($field)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dataHasChangedFor');
        return $pluginInfo ? $this->___callPlugins('dataHasChangedFor', func_get_args(), $pluginInfo) : parent::dataHasChangedFor($field);
    }

    /**
     * {@inheritdoc}
     */
    public function getResourceName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getResourceName');
        return $pluginInfo ? $this->___callPlugins('getResourceName', func_get_args(), $pluginInfo) : parent::getResourceName();
    }

    /**
     * {@inheritdoc}
     */
    public function getResourceCollection()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getResourceCollection');
        return $pluginInfo ? $this->___callPlugins('getResourceCollection', func_get_args(), $pluginInfo) : parent::getResourceCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getCollection()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCollection');
        return $pluginInfo ? $this->___callPlugins('getCollection', func_get_args(), $pluginInfo) : parent::getCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function load($modelId, $field = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'load');
        return $pluginInfo ? $this->___callPlugins('load', func_get_args(), $pluginInfo) : parent::load($modelId, $field);
    }

    /**
     * {@inheritdoc}
     */
    public function beforeLoad($identifier, $field = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'beforeLoad');
        return $pluginInfo ? $this->___callPlugins('beforeLoad', func_get_args(), $pluginInfo) : parent::beforeLoad($identifier, $field);
    }

    /**
     * {@inheritdoc}
     */
    public function afterLoad()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'afterLoad');
        return $pluginInfo ? $this->___callPlugins('afterLoad', func_get_args(), $pluginInfo) : parent::afterLoad();
    }

    /**
     * {@inheritdoc}
     */
    public function isSaveAllowed()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isSaveAllowed');
        return $pluginInfo ? $this->___callPlugins('isSaveAllowed', func_get_args(), $pluginInfo) : parent::isSaveAllowed();
    }

    /**
     * {@inheritdoc}
     */
    public function setHasDataChanges($flag)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHasDataChanges');
        return $pluginInfo ? $this->___callPlugins('setHasDataChanges', func_get_args(), $pluginInfo) : parent::setHasDataChanges($flag);
    }

    /**
     * {@inheritdoc}
     */
    public function save()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'save');
        return $pluginInfo ? $this->___callPlugins('save', func_get_args(), $pluginInfo) : parent::save();
    }

    /**
     * {@inheritdoc}
     */
    public function afterCommitCallback()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'afterCommitCallback');
        return $pluginInfo ? $this->___callPlugins('afterCommitCallback', func_get_args(), $pluginInfo) : parent::afterCommitCallback();
    }

    /**
     * {@inheritdoc}
     */
    public function isObjectNew($flag = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isObjectNew');
        return $pluginInfo ? $this->___callPlugins('isObjectNew', func_get_args(), $pluginInfo) : parent::isObjectNew($flag);
    }

    /**
     * {@inheritdoc}
     */
    public function beforeSave()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'beforeSave');
        return $pluginInfo ? $this->___callPlugins('beforeSave', func_get_args(), $pluginInfo) : parent::beforeSave();
    }

    /**
     * {@inheritdoc}
     */
    public function validateBeforeSave()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'validateBeforeSave');
        return $pluginInfo ? $this->___callPlugins('validateBeforeSave', func_get_args(), $pluginInfo) : parent::validateBeforeSave();
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheTags()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCacheTags');
        return $pluginInfo ? $this->___callPlugins('getCacheTags', func_get_args(), $pluginInfo) : parent::getCacheTags();
    }

    /**
     * {@inheritdoc}
     */
    public function cleanModelCache()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'cleanModelCache');
        return $pluginInfo ? $this->___callPlugins('cleanModelCache', func_get_args(), $pluginInfo) : parent::cleanModelCache();
    }

    /**
     * {@inheritdoc}
     */
    public function afterSave()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'afterSave');
        return $pluginInfo ? $this->___callPlugins('afterSave', func_get_args(), $pluginInfo) : parent::afterSave();
    }

    /**
     * {@inheritdoc}
     */
    public function delete()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'delete');
        return $pluginInfo ? $this->___callPlugins('delete', func_get_args(), $pluginInfo) : parent::delete();
    }

    /**
     * {@inheritdoc}
     */
    public function beforeDelete()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'beforeDelete');
        return $pluginInfo ? $this->___callPlugins('beforeDelete', func_get_args(), $pluginInfo) : parent::beforeDelete();
    }

    /**
     * {@inheritdoc}
     */
    public function afterDelete()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'afterDelete');
        return $pluginInfo ? $this->___callPlugins('afterDelete', func_get_args(), $pluginInfo) : parent::afterDelete();
    }

    /**
     * {@inheritdoc}
     */
    public function afterDeleteCommit()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'afterDeleteCommit');
        return $pluginInfo ? $this->___callPlugins('afterDeleteCommit', func_get_args(), $pluginInfo) : parent::afterDeleteCommit();
    }

    /**
     * {@inheritdoc}
     */
    public function getResource()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getResource');
        return $pluginInfo ? $this->___callPlugins('getResource', func_get_args(), $pluginInfo) : parent::getResource();
    }

    /**
     * {@inheritdoc}
     */
    public function getEntityId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEntityId');
        return $pluginInfo ? $this->___callPlugins('getEntityId', func_get_args(), $pluginInfo) : parent::getEntityId();
    }

    /**
     * {@inheritdoc}
     */
    public function setEntityId($entityId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setEntityId');
        return $pluginInfo ? $this->___callPlugins('setEntityId', func_get_args(), $pluginInfo) : parent::setEntityId($entityId);
    }

    /**
     * {@inheritdoc}
     */
    public function clearInstance()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'clearInstance');
        return $pluginInfo ? $this->___callPlugins('clearInstance', func_get_args(), $pluginInfo) : parent::clearInstance();
    }

    /**
     * {@inheritdoc}
     */
    public function getStoredData()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStoredData');
        return $pluginInfo ? $this->___callPlugins('getStoredData', func_get_args(), $pluginInfo) : parent::getStoredData();
    }

    /**
     * {@inheritdoc}
     */
    public function getEventPrefix()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEventPrefix');
        return $pluginInfo ? $this->___callPlugins('getEventPrefix', func_get_args(), $pluginInfo) : parent::getEventPrefix();
    }

    /**
     * {@inheritdoc}
     */
    public function addData(array $arr)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addData');
        return $pluginInfo ? $this->___callPlugins('addData', func_get_args(), $pluginInfo) : parent::addData($arr);
    }

    /**
     * {@inheritdoc}
     */
    public function getDataByPath($path)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDataByPath');
        return $pluginInfo ? $this->___callPlugins('getDataByPath', func_get_args(), $pluginInfo) : parent::getDataByPath($path);
    }

    /**
     * {@inheritdoc}
     */
    public function getDataByKey($key)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDataByKey');
        return $pluginInfo ? $this->___callPlugins('getDataByKey', func_get_args(), $pluginInfo) : parent::getDataByKey($key);
    }

    /**
     * {@inheritdoc}
     */
    public function setDataUsingMethod($key, $args = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDataUsingMethod');
        return $pluginInfo ? $this->___callPlugins('setDataUsingMethod', func_get_args(), $pluginInfo) : parent::setDataUsingMethod($key, $args);
    }

    /**
     * {@inheritdoc}
     */
    public function getDataUsingMethod($key, $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDataUsingMethod');
        return $pluginInfo ? $this->___callPlugins('getDataUsingMethod', func_get_args(), $pluginInfo) : parent::getDataUsingMethod($key, $args);
    }

    /**
     * {@inheritdoc}
     */
    public function hasData($key = '')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasData');
        return $pluginInfo ? $this->___callPlugins('hasData', func_get_args(), $pluginInfo) : parent::hasData($key);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(array $keys = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toArray');
        return $pluginInfo ? $this->___callPlugins('toArray', func_get_args(), $pluginInfo) : parent::toArray($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToArray(array $keys = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'convertToArray');
        return $pluginInfo ? $this->___callPlugins('convertToArray', func_get_args(), $pluginInfo) : parent::convertToArray($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function toXml(array $keys = [], $rootName = 'item', $addOpenTag = false, $addCdata = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toXml');
        return $pluginInfo ? $this->___callPlugins('toXml', func_get_args(), $pluginInfo) : parent::toXml($keys, $rootName, $addOpenTag, $addCdata);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToXml(array $arrAttributes = [], $rootName = 'item', $addOpenTag = false, $addCdata = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'convertToXml');
        return $pluginInfo ? $this->___callPlugins('convertToXml', func_get_args(), $pluginInfo) : parent::convertToXml($arrAttributes, $rootName, $addOpenTag, $addCdata);
    }

    /**
     * {@inheritdoc}
     */
    public function toJson(array $keys = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toJson');
        return $pluginInfo ? $this->___callPlugins('toJson', func_get_args(), $pluginInfo) : parent::toJson($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToJson(array $keys = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'convertToJson');
        return $pluginInfo ? $this->___callPlugins('convertToJson', func_get_args(), $pluginInfo) : parent::convertToJson($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function toString($format = '')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toString');
        return $pluginInfo ? $this->___callPlugins('toString', func_get_args(), $pluginInfo) : parent::toString($format);
    }

    /**
     * {@inheritdoc}
     */
    public function __call($method, $args)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, '__call');
        return $pluginInfo ? $this->___callPlugins('__call', func_get_args(), $pluginInfo) : parent::__call($method, $args);
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isEmpty');
        return $pluginInfo ? $this->___callPlugins('isEmpty', func_get_args(), $pluginInfo) : parent::isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($keys = [], $valueSeparator = '=', $fieldSeparator = ' ', $quote = '"')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'serialize');
        return $pluginInfo ? $this->___callPlugins('serialize', func_get_args(), $pluginInfo) : parent::serialize($keys, $valueSeparator, $fieldSeparator, $quote);
    }

    /**
     * {@inheritdoc}
     */
    public function debug($data = null, &$objects = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'debug');
        return $pluginInfo ? $this->___callPlugins('debug', func_get_args(), $pluginInfo) : parent::debug($data, $objects);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'offsetSet');
        return $pluginInfo ? $this->___callPlugins('offsetSet', func_get_args(), $pluginInfo) : parent::offsetSet($offset, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'offsetExists');
        return $pluginInfo ? $this->___callPlugins('offsetExists', func_get_args(), $pluginInfo) : parent::offsetExists($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'offsetUnset');
        return $pluginInfo ? $this->___callPlugins('offsetUnset', func_get_args(), $pluginInfo) : parent::offsetUnset($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'offsetGet');
        return $pluginInfo ? $this->___callPlugins('offsetGet', func_get_args(), $pluginInfo) : parent::offsetGet($offset);
    }
}
