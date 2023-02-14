<?php
namespace Magento\Quote\Model\Quote;

/**
 * Interceptor class for @see \Magento\Quote\Model\Quote
 */
class Interceptor extends \Magento\Quote\Model\Quote implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Model\Context $context, \Magento\Framework\Registry $registry, \Magento\Framework\Api\ExtensionAttributesFactory $extensionFactory, \Magento\Framework\Api\AttributeValueFactory $customAttributeFactory, \Magento\Quote\Model\QuoteValidator $quoteValidator, \Magento\Catalog\Helper\Product $catalogProduct, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\App\Config\ScopeConfigInterface $config, \Magento\Quote\Model\Quote\AddressFactory $quoteAddressFactory, \Magento\Customer\Model\CustomerFactory $customerFactory, \Magento\Customer\Api\GroupRepositoryInterface $groupRepository, \Magento\Quote\Model\ResourceModel\Quote\Item\CollectionFactory $quoteItemCollectionFactory, \Magento\Quote\Model\Quote\ItemFactory $quoteItemFactory, \Magento\Framework\Message\Factory $messageFactory, \Magento\Sales\Model\Status\ListFactory $statusListFactory, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\Quote\Model\Quote\PaymentFactory $quotePaymentFactory, \Magento\Quote\Model\ResourceModel\Quote\Payment\CollectionFactory $quotePaymentCollectionFactory, \Magento\Framework\DataObject\Copy $objectCopyService, \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry, \Magento\Quote\Model\Quote\Item\Processor $itemProcessor, \Magento\Framework\DataObject\Factory $objectFactory, \Magento\Customer\Api\AddressRepositoryInterface $addressRepository, \Magento\Framework\Api\SearchCriteriaBuilder $criteriaBuilder, \Magento\Framework\Api\FilterBuilder $filterBuilder, \Magento\Customer\Api\Data\AddressInterfaceFactory $addressDataFactory, \Magento\Customer\Api\Data\CustomerInterfaceFactory $customerDataFactory, \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository, \Magento\Framework\Api\DataObjectHelper $dataObjectHelper, \Magento\Framework\Api\ExtensibleDataObjectConverter $extensibleDataObjectConverter, \Magento\Quote\Model\Cart\CurrencyFactory $currencyFactory, \Magento\Framework\Api\ExtensionAttribute\JoinProcessorInterface $extensionAttributesJoinProcessor, \Magento\Quote\Model\Quote\TotalsCollector $totalsCollector, \Magento\Quote\Model\Quote\TotalsReader $totalsReader, \Magento\Quote\Model\ShippingFactory $shippingFactory, \Magento\Quote\Model\ShippingAssignmentFactory $shippingAssignmentFactory, ?\Magento\Framework\Model\ResourceModel\AbstractResource $resource = null, ?\Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null, array $data = [], ?\Magento\Sales\Model\OrderIncrementIdChecker $orderIncrementIdChecker = null, ?\Magento\Directory\Model\AllowedCountries $allowedCountriesReader = null)
    {
        $this->___init();
        parent::__construct($context, $registry, $extensionFactory, $customAttributeFactory, $quoteValidator, $catalogProduct, $scopeConfig, $storeManager, $config, $quoteAddressFactory, $customerFactory, $groupRepository, $quoteItemCollectionFactory, $quoteItemFactory, $messageFactory, $statusListFactory, $productRepository, $quotePaymentFactory, $quotePaymentCollectionFactory, $objectCopyService, $stockRegistry, $itemProcessor, $objectFactory, $addressRepository, $criteriaBuilder, $filterBuilder, $addressDataFactory, $customerDataFactory, $customerRepository, $dataObjectHelper, $extensibleDataObjectConverter, $currencyFactory, $extensionAttributesJoinProcessor, $totalsCollector, $totalsReader, $shippingFactory, $shippingAssignmentFactory, $resource, $resourceCollection, $data, $orderIncrementIdChecker, $allowedCountriesReader);
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrency()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCurrency');
        return $pluginInfo ? $this->___callPlugins('getCurrency', func_get_args(), $pluginInfo) : parent::getCurrency();
    }

    /**
     * {@inheritdoc}
     */
    public function setCurrency(?\Magento\Quote\Api\Data\CurrencyInterface $currency = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCurrency');
        return $pluginInfo ? $this->___callPlugins('setCurrency', func_get_args(), $pluginInfo) : parent::setCurrency($currency);
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
    public function setItems(?array $items = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setItems');
        return $pluginInfo ? $this->___callPlugins('setItems', func_get_args(), $pluginInfo) : parent::setItems($items);
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
    public function getUpdatedAt()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUpdatedAt');
        return $pluginInfo ? $this->___callPlugins('getUpdatedAt', func_get_args(), $pluginInfo) : parent::getUpdatedAt();
    }

    /**
     * {@inheritdoc}
     */
    public function setUpdatedAt($updatedAt)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setUpdatedAt');
        return $pluginInfo ? $this->___callPlugins('setUpdatedAt', func_get_args(), $pluginInfo) : parent::setUpdatedAt($updatedAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getConvertedAt()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getConvertedAt');
        return $pluginInfo ? $this->___callPlugins('getConvertedAt', func_get_args(), $pluginInfo) : parent::getConvertedAt();
    }

    /**
     * {@inheritdoc}
     */
    public function setConvertedAt($convertedAt)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setConvertedAt');
        return $pluginInfo ? $this->___callPlugins('setConvertedAt', func_get_args(), $pluginInfo) : parent::setConvertedAt($convertedAt);
    }

    /**
     * {@inheritdoc}
     */
    public function getIsActive()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getIsActive');
        return $pluginInfo ? $this->___callPlugins('getIsActive', func_get_args(), $pluginInfo) : parent::getIsActive();
    }

    /**
     * {@inheritdoc}
     */
    public function setIsActive($isActive)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setIsActive');
        return $pluginInfo ? $this->___callPlugins('setIsActive', func_get_args(), $pluginInfo) : parent::setIsActive($isActive);
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
    public function getItemsCount()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemsCount');
        return $pluginInfo ? $this->___callPlugins('getItemsCount', func_get_args(), $pluginInfo) : parent::getItemsCount();
    }

    /**
     * {@inheritdoc}
     */
    public function setItemsCount($itemsCount)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setItemsCount');
        return $pluginInfo ? $this->___callPlugins('setItemsCount', func_get_args(), $pluginInfo) : parent::setItemsCount($itemsCount);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemsQty()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemsQty');
        return $pluginInfo ? $this->___callPlugins('getItemsQty', func_get_args(), $pluginInfo) : parent::getItemsQty();
    }

    /**
     * {@inheritdoc}
     */
    public function setItemsQty($itemsQty)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setItemsQty');
        return $pluginInfo ? $this->___callPlugins('setItemsQty', func_get_args(), $pluginInfo) : parent::setItemsQty($itemsQty);
    }

    /**
     * {@inheritdoc}
     */
    public function getOrigOrderId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getOrigOrderId');
        return $pluginInfo ? $this->___callPlugins('getOrigOrderId', func_get_args(), $pluginInfo) : parent::getOrigOrderId();
    }

    /**
     * {@inheritdoc}
     */
    public function setOrigOrderId($origOrderId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setOrigOrderId');
        return $pluginInfo ? $this->___callPlugins('setOrigOrderId', func_get_args(), $pluginInfo) : parent::setOrigOrderId($origOrderId);
    }

    /**
     * {@inheritdoc}
     */
    public function getReservedOrderId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getReservedOrderId');
        return $pluginInfo ? $this->___callPlugins('getReservedOrderId', func_get_args(), $pluginInfo) : parent::getReservedOrderId();
    }

    /**
     * {@inheritdoc}
     */
    public function setReservedOrderId($reservedOrderId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setReservedOrderId');
        return $pluginInfo ? $this->___callPlugins('setReservedOrderId', func_get_args(), $pluginInfo) : parent::setReservedOrderId($reservedOrderId);
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
    public function setCustomerIsGuest($customerIsGuest)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerIsGuest');
        return $pluginInfo ? $this->___callPlugins('setCustomerIsGuest', func_get_args(), $pluginInfo) : parent::setCustomerIsGuest($customerIsGuest);
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
    public function setCustomerNote($customerNote)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerNote');
        return $pluginInfo ? $this->___callPlugins('setCustomerNote', func_get_args(), $pluginInfo) : parent::setCustomerNote($customerNote);
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
    public function setCustomerNoteNotify($customerNoteNotify)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerNoteNotify');
        return $pluginInfo ? $this->___callPlugins('setCustomerNoteNotify', func_get_args(), $pluginInfo) : parent::setCustomerNoteNotify($customerNoteNotify);
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
    public function setStoreId($storeId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStoreId');
        return $pluginInfo ? $this->___callPlugins('setStoreId', func_get_args(), $pluginInfo) : parent::setStoreId($storeId);
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
    public function setStore(\Magento\Store\Model\Store $store)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStore');
        return $pluginInfo ? $this->___callPlugins('setStore', func_get_args(), $pluginInfo) : parent::setStore($store);
    }

    /**
     * {@inheritdoc}
     */
    public function getSharedStoreIds()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSharedStoreIds');
        return $pluginInfo ? $this->___callPlugins('getSharedStoreIds', func_get_args(), $pluginInfo) : parent::getSharedStoreIds();
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
    public function loadByCustomer($customer)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadByCustomer');
        return $pluginInfo ? $this->___callPlugins('loadByCustomer', func_get_args(), $pluginInfo) : parent::loadByCustomer($customer);
    }

    /**
     * {@inheritdoc}
     */
    public function loadActive($quoteId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadActive');
        return $pluginInfo ? $this->___callPlugins('loadActive', func_get_args(), $pluginInfo) : parent::loadActive($quoteId);
    }

    /**
     * {@inheritdoc}
     */
    public function loadByIdWithoutStore($quoteId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadByIdWithoutStore');
        return $pluginInfo ? $this->___callPlugins('loadByIdWithoutStore', func_get_args(), $pluginInfo) : parent::loadByIdWithoutStore($quoteId);
    }

    /**
     * {@inheritdoc}
     */
    public function assignCustomer(\Magento\Customer\Api\Data\CustomerInterface $customer)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'assignCustomer');
        return $pluginInfo ? $this->___callPlugins('assignCustomer', func_get_args(), $pluginInfo) : parent::assignCustomer($customer);
    }

    /**
     * {@inheritdoc}
     */
    public function assignCustomerWithAddressChange(\Magento\Customer\Api\Data\CustomerInterface $customer, ?\Magento\Quote\Model\Quote\Address $billingAddress = null, ?\Magento\Quote\Model\Quote\Address $shippingAddress = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'assignCustomerWithAddressChange');
        return $pluginInfo ? $this->___callPlugins('assignCustomerWithAddressChange', func_get_args(), $pluginInfo) : parent::assignCustomerWithAddressChange($customer, $billingAddress, $shippingAddress);
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomer(?\Magento\Customer\Api\Data\CustomerInterface $customer = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomer');
        return $pluginInfo ? $this->___callPlugins('setCustomer', func_get_args(), $pluginInfo) : parent::setCustomer($customer);
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomer()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomer');
        return $pluginInfo ? $this->___callPlugins('getCustomer', func_get_args(), $pluginInfo) : parent::getCustomer();
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerAddressData(array $addresses)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerAddressData');
        return $pluginInfo ? $this->___callPlugins('setCustomerAddressData', func_get_args(), $pluginInfo) : parent::setCustomerAddressData($addresses);
    }

    /**
     * {@inheritdoc}
     */
    public function addCustomerAddress(\Magento\Customer\Api\Data\AddressInterface $address)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addCustomerAddress');
        return $pluginInfo ? $this->___callPlugins('addCustomerAddress', func_get_args(), $pluginInfo) : parent::addCustomerAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function updateCustomerData(\Magento\Customer\Api\Data\CustomerInterface $customer)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'updateCustomerData');
        return $pluginInfo ? $this->___callPlugins('updateCustomerData', func_get_args(), $pluginInfo) : parent::updateCustomerData($customer);
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
    public function getCustomerTaxClassId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCustomerTaxClassId');
        return $pluginInfo ? $this->___callPlugins('getCustomerTaxClassId', func_get_args(), $pluginInfo) : parent::getCustomerTaxClassId();
    }

    /**
     * {@inheritdoc}
     */
    public function setCustomerTaxClassId($customerTaxClassId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCustomerTaxClassId');
        return $pluginInfo ? $this->___callPlugins('setCustomerTaxClassId', func_get_args(), $pluginInfo) : parent::setCustomerTaxClassId($customerTaxClassId);
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
    public function getAllShippingAddresses()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllShippingAddresses');
        return $pluginInfo ? $this->___callPlugins('getAllShippingAddresses', func_get_args(), $pluginInfo) : parent::getAllShippingAddresses();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllAddresses()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllAddresses');
        return $pluginInfo ? $this->___callPlugins('getAllAddresses', func_get_args(), $pluginInfo) : parent::getAllAddresses();
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
    public function getAddressByCustomerAddressId($addressId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAddressByCustomerAddressId');
        return $pluginInfo ? $this->___callPlugins('getAddressByCustomerAddressId', func_get_args(), $pluginInfo) : parent::getAddressByCustomerAddressId($addressId);
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingAddressByCustomerAddressId($addressId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingAddressByCustomerAddressId');
        return $pluginInfo ? $this->___callPlugins('getShippingAddressByCustomerAddressId', func_get_args(), $pluginInfo) : parent::getShippingAddressByCustomerAddressId($addressId);
    }

    /**
     * {@inheritdoc}
     */
    public function removeAddress($addressId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removeAddress');
        return $pluginInfo ? $this->___callPlugins('removeAddress', func_get_args(), $pluginInfo) : parent::removeAddress($addressId);
    }

    /**
     * {@inheritdoc}
     */
    public function removeAllAddresses()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removeAllAddresses');
        return $pluginInfo ? $this->___callPlugins('removeAllAddresses', func_get_args(), $pluginInfo) : parent::removeAllAddresses();
    }

    /**
     * {@inheritdoc}
     */
    public function addAddress(\Magento\Quote\Api\Data\AddressInterface $address)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addAddress');
        return $pluginInfo ? $this->___callPlugins('addAddress', func_get_args(), $pluginInfo) : parent::addAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function setBillingAddress(?\Magento\Quote\Api\Data\AddressInterface $address = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setBillingAddress');
        return $pluginInfo ? $this->___callPlugins('setBillingAddress', func_get_args(), $pluginInfo) : parent::setBillingAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function setShippingAddress(?\Magento\Quote\Api\Data\AddressInterface $address = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setShippingAddress');
        return $pluginInfo ? $this->___callPlugins('setShippingAddress', func_get_args(), $pluginInfo) : parent::setShippingAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function addShippingAddress(\Magento\Quote\Api\Data\AddressInterface $address)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addShippingAddress');
        return $pluginInfo ? $this->___callPlugins('addShippingAddress', func_get_args(), $pluginInfo) : parent::addShippingAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemsCollection($useCache = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemsCollection');
        return $pluginInfo ? $this->___callPlugins('getItemsCollection', func_get_args(), $pluginInfo) : parent::getItemsCollection($useCache);
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
    public function hasItems()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasItems');
        return $pluginInfo ? $this->___callPlugins('hasItems', func_get_args(), $pluginInfo) : parent::hasItems();
    }

    /**
     * {@inheritdoc}
     */
    public function hasItemsWithDecimalQty()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasItemsWithDecimalQty');
        return $pluginInfo ? $this->___callPlugins('hasItemsWithDecimalQty', func_get_args(), $pluginInfo) : parent::hasItemsWithDecimalQty();
    }

    /**
     * {@inheritdoc}
     */
    public function hasProductId($productId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasProductId');
        return $pluginInfo ? $this->___callPlugins('hasProductId', func_get_args(), $pluginInfo) : parent::hasProductId($productId);
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
    public function deleteItem(\Magento\Quote\Model\Quote\Item $item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'deleteItem');
        return $pluginInfo ? $this->___callPlugins('deleteItem', func_get_args(), $pluginInfo) : parent::deleteItem($item);
    }

    /**
     * {@inheritdoc}
     */
    public function removeItem($itemId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removeItem');
        return $pluginInfo ? $this->___callPlugins('removeItem', func_get_args(), $pluginInfo) : parent::removeItem($itemId);
    }

    /**
     * {@inheritdoc}
     */
    public function removeAllItems()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removeAllItems');
        return $pluginInfo ? $this->___callPlugins('removeAllItems', func_get_args(), $pluginInfo) : parent::removeAllItems();
    }

    /**
     * {@inheritdoc}
     */
    public function addItem(\Magento\Quote\Model\Quote\Item $item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addItem');
        return $pluginInfo ? $this->___callPlugins('addItem', func_get_args(), $pluginInfo) : parent::addItem($item);
    }

    /**
     * {@inheritdoc}
     */
    public function addProduct(\Magento\Catalog\Model\Product $product, $request = null, $processMode = 'full')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addProduct');
        return $pluginInfo ? $this->___callPlugins('addProduct', func_get_args(), $pluginInfo) : parent::addProduct($product, $request, $processMode);
    }

    /**
     * {@inheritdoc}
     */
    public function updateItem($itemId, $buyRequest, $params = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'updateItem');
        return $pluginInfo ? $this->___callPlugins('updateItem', func_get_args(), $pluginInfo) : parent::updateItem($itemId, $buyRequest, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemByProduct($product)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemByProduct');
        return $pluginInfo ? $this->___callPlugins('getItemByProduct', func_get_args(), $pluginInfo) : parent::getItemByProduct($product);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemsSummaryQty()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemsSummaryQty');
        return $pluginInfo ? $this->___callPlugins('getItemsSummaryQty', func_get_args(), $pluginInfo) : parent::getItemsSummaryQty();
    }

    /**
     * {@inheritdoc}
     */
    public function getItemVirtualQty()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemVirtualQty');
        return $pluginInfo ? $this->___callPlugins('getItemVirtualQty', func_get_args(), $pluginInfo) : parent::getItemVirtualQty();
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
    public function getPayment()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPayment');
        return $pluginInfo ? $this->___callPlugins('getPayment', func_get_args(), $pluginInfo) : parent::getPayment();
    }

    /**
     * {@inheritdoc}
     */
    public function setPayment(\Magento\Quote\Api\Data\PaymentInterface $payment)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setPayment');
        return $pluginInfo ? $this->___callPlugins('setPayment', func_get_args(), $pluginInfo) : parent::setPayment($payment);
    }

    /**
     * {@inheritdoc}
     */
    public function removePayment()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removePayment');
        return $pluginInfo ? $this->___callPlugins('removePayment', func_get_args(), $pluginInfo) : parent::removePayment();
    }

    /**
     * {@inheritdoc}
     */
    public function collectTotals()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'collectTotals');
        return $pluginInfo ? $this->___callPlugins('collectTotals', func_get_args(), $pluginInfo) : parent::collectTotals();
    }

    /**
     * {@inheritdoc}
     */
    public function getTotals()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTotals');
        return $pluginInfo ? $this->___callPlugins('getTotals', func_get_args(), $pluginInfo) : parent::getTotals();
    }

    /**
     * {@inheritdoc}
     */
    public function addMessage($message, $index = 'error')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addMessage');
        return $pluginInfo ? $this->___callPlugins('addMessage', func_get_args(), $pluginInfo) : parent::addMessage($message, $index);
    }

    /**
     * {@inheritdoc}
     */
    public function getMessages()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getMessages');
        return $pluginInfo ? $this->___callPlugins('getMessages', func_get_args(), $pluginInfo) : parent::getMessages();
    }

    /**
     * {@inheritdoc}
     */
    public function getErrors()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getErrors');
        return $pluginInfo ? $this->___callPlugins('getErrors', func_get_args(), $pluginInfo) : parent::getErrors();
    }

    /**
     * {@inheritdoc}
     */
    public function setHasError($flag)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHasError');
        return $pluginInfo ? $this->___callPlugins('setHasError', func_get_args(), $pluginInfo) : parent::setHasError($flag);
    }

    /**
     * {@inheritdoc}
     */
    public function addErrorInfo($type = 'error', $origin = null, $code = null, $message = null, $additionalData = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addErrorInfo');
        return $pluginInfo ? $this->___callPlugins('addErrorInfo', func_get_args(), $pluginInfo) : parent::addErrorInfo($type, $origin, $code, $message, $additionalData);
    }

    /**
     * {@inheritdoc}
     */
    public function removeErrorInfosByParams($type, $params)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removeErrorInfosByParams');
        return $pluginInfo ? $this->___callPlugins('removeErrorInfosByParams', func_get_args(), $pluginInfo) : parent::removeErrorInfosByParams($type, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function removeMessageByText($type, $text)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removeMessageByText');
        return $pluginInfo ? $this->___callPlugins('removeMessageByText', func_get_args(), $pluginInfo) : parent::removeMessageByText($type, $text);
    }

    /**
     * {@inheritdoc}
     */
    public function reserveOrderId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'reserveOrderId');
        return $pluginInfo ? $this->___callPlugins('reserveOrderId', func_get_args(), $pluginInfo) : parent::reserveOrderId();
    }

    /**
     * {@inheritdoc}
     */
    public function validateMinimumAmount($multishipping = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'validateMinimumAmount');
        return $pluginInfo ? $this->___callPlugins('validateMinimumAmount', func_get_args(), $pluginInfo) : parent::validateMinimumAmount($multishipping);
    }

    /**
     * {@inheritdoc}
     */
    public function isVirtual()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isVirtual');
        return $pluginInfo ? $this->___callPlugins('isVirtual', func_get_args(), $pluginInfo) : parent::isVirtual();
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
    public function hasVirtualItems()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasVirtualItems');
        return $pluginInfo ? $this->___callPlugins('hasVirtualItems', func_get_args(), $pluginInfo) : parent::hasVirtualItems();
    }

    /**
     * {@inheritdoc}
     */
    public function merge(\Magento\Quote\Model\Quote $quote)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'merge');
        return $pluginInfo ? $this->___callPlugins('merge', func_get_args(), $pluginInfo) : parent::merge($quote);
    }

    /**
     * {@inheritdoc}
     */
    public function addressCollectionWasSet()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addressCollectionWasSet');
        return $pluginInfo ? $this->___callPlugins('addressCollectionWasSet', func_get_args(), $pluginInfo) : parent::addressCollectionWasSet();
    }

    /**
     * {@inheritdoc}
     */
    public function itemsCollectionWasSet()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'itemsCollectionWasSet');
        return $pluginInfo ? $this->___callPlugins('itemsCollectionWasSet', func_get_args(), $pluginInfo) : parent::itemsCollectionWasSet();
    }

    /**
     * {@inheritdoc}
     */
    public function paymentsCollectionWasSet()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'paymentsCollectionWasSet');
        return $pluginInfo ? $this->___callPlugins('paymentsCollectionWasSet', func_get_args(), $pluginInfo) : parent::paymentsCollectionWasSet();
    }

    /**
     * {@inheritdoc}
     */
    public function currentPaymentWasSet()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'currentPaymentWasSet');
        return $pluginInfo ? $this->___callPlugins('currentPaymentWasSet', func_get_args(), $pluginInfo) : parent::currentPaymentWasSet();
    }

    /**
     * {@inheritdoc}
     */
    public function getCheckoutMethod($originalMethod = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCheckoutMethod');
        return $pluginInfo ? $this->___callPlugins('getCheckoutMethod', func_get_args(), $pluginInfo) : parent::getCheckoutMethod($originalMethod);
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingAddressesItems()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingAddressesItems');
        return $pluginInfo ? $this->___callPlugins('getShippingAddressesItems', func_get_args(), $pluginInfo) : parent::getShippingAddressesItems();
    }

    /**
     * {@inheritdoc}
     */
    public function setCheckoutMethod($checkoutMethod)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCheckoutMethod');
        return $pluginInfo ? $this->___callPlugins('setCheckoutMethod', func_get_args(), $pluginInfo) : parent::setCheckoutMethod($checkoutMethod);
    }

    /**
     * {@inheritdoc}
     */
    public function preventSaving()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'preventSaving');
        return $pluginInfo ? $this->___callPlugins('preventSaving', func_get_args(), $pluginInfo) : parent::preventSaving();
    }

    /**
     * {@inheritdoc}
     */
    public function isPreventSaving()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isPreventSaving');
        return $pluginInfo ? $this->___callPlugins('isPreventSaving', func_get_args(), $pluginInfo) : parent::isPreventSaving();
    }

    /**
     * {@inheritdoc}
     */
    public function isMultipleShippingAddresses()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isMultipleShippingAddresses');
        return $pluginInfo ? $this->___callPlugins('isMultipleShippingAddresses', func_get_args(), $pluginInfo) : parent::isMultipleShippingAddresses();
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
    public function setExtensionAttributes(\Magento\Quote\Api\Data\CartExtensionInterface $extensionAttributes)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setExtensionAttributes');
        return $pluginInfo ? $this->___callPlugins('setExtensionAttributes', func_get_args(), $pluginInfo) : parent::setExtensionAttributes($extensionAttributes);
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
    public function unsetData($key = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'unsetData');
        return $pluginInfo ? $this->___callPlugins('unsetData', func_get_args(), $pluginInfo) : parent::unsetData($key);
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
