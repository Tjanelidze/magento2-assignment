<?php
namespace Magento\Newsletter\Model\Subscriber;

/**
 * Interceptor class for @see \Magento\Newsletter\Model\Subscriber
 */
class Interceptor extends \Magento\Newsletter\Model\Subscriber implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Model\Context $context, \Magento\Framework\Registry $registry, \Magento\Newsletter\Helper\Data $newsletterData, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Framework\Mail\Template\TransportBuilder $transportBuilder, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Customer\Model\Session $customerSession, \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository, \Magento\Customer\Api\AccountManagementInterface $customerAccountManagement, \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation, ?\Magento\Framework\Model\ResourceModel\AbstractResource $resource = null, ?\Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null, array $data = [], ?\Magento\Framework\Stdlib\DateTime\DateTime $dateTime = null, ?\Magento\Customer\Api\Data\CustomerInterfaceFactory $customerFactory = null, ?\Magento\Framework\Api\DataObjectHelper $dataObjectHelper = null, ?\Magento\Newsletter\Model\SubscriptionManagerInterface $subscriptionManager = null)
    {
        $this->___init();
        parent::__construct($context, $registry, $newsletterData, $scopeConfig, $transportBuilder, $storeManager, $customerSession, $customerRepository, $customerAccountManagement, $inlineTranslation, $resource, $resourceCollection, $data, $dateTime, $customerFactory, $dataObjectHelper, $subscriptionManager);
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
    public function setId($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setId');
        return $pluginInfo ? $this->___callPlugins('setId', func_get_args(), $pluginInfo) : parent::setId($value);
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCode');
        return $pluginInfo ? $this->___callPlugins('getCode', func_get_args(), $pluginInfo) : parent::getCode();
    }

    /**
     * {@inheritdoc}
     */
    public function getConfirmationLink()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getConfirmationLink');
        return $pluginInfo ? $this->___callPlugins('getConfirmationLink', func_get_args(), $pluginInfo) : parent::getConfirmationLink();
    }

    /**
     * {@inheritdoc}
     */
    public function getUnsubscriptionLink()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUnsubscriptionLink');
        return $pluginInfo ? $this->___callPlugins('getUnsubscriptionLink', func_get_args(), $pluginInfo) : parent::getUnsubscriptionLink();
    }

    /**
     * {@inheritdoc}
     */
    public function setCode($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCode');
        return $pluginInfo ? $this->___callPlugins('setCode', func_get_args(), $pluginInfo) : parent::setCode($value);
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
    public function setStatus($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStatus');
        return $pluginInfo ? $this->___callPlugins('setStatus', func_get_args(), $pluginInfo) : parent::setStatus($value);
    }

    /**
     * {@inheritdoc}
     */
    public function setMessagesScope($scope)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setMessagesScope');
        return $pluginInfo ? $this->___callPlugins('setMessagesScope', func_get_args(), $pluginInfo) : parent::setMessagesScope($scope);
    }

    /**
     * {@inheritdoc}
     */
    public function getEmail()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getEmail');
        return $pluginInfo ? $this->___callPlugins('getEmail', func_get_args(), $pluginInfo) : parent::getEmail();
    }

    /**
     * {@inheritdoc}
     */
    public function setEmail($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setEmail');
        return $pluginInfo ? $this->___callPlugins('setEmail', func_get_args(), $pluginInfo) : parent::setEmail($value);
    }

    /**
     * {@inheritdoc}
     */
    public function setStatusChanged($value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStatusChanged');
        return $pluginInfo ? $this->___callPlugins('setStatusChanged', func_get_args(), $pluginInfo) : parent::setStatusChanged($value);
    }

    /**
     * {@inheritdoc}
     */
    public function isStatusChanged()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isStatusChanged');
        return $pluginInfo ? $this->___callPlugins('isStatusChanged', func_get_args(), $pluginInfo) : parent::isStatusChanged();
    }

    /**
     * {@inheritdoc}
     */
    public function isSubscribed()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isSubscribed');
        return $pluginInfo ? $this->___callPlugins('isSubscribed', func_get_args(), $pluginInfo) : parent::isSubscribed();
    }

    /**
     * {@inheritdoc}
     */
    public function loadBySubscriberEmail(string $email, int $websiteId) : \Magento\Newsletter\Model\Subscriber
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadBySubscriberEmail');
        return $pluginInfo ? $this->___callPlugins('loadBySubscriberEmail', func_get_args(), $pluginInfo) : parent::loadBySubscriberEmail($email, $websiteId);
    }

    /**
     * {@inheritdoc}
     */
    public function loadByCustomer(int $customerId, int $websiteId) : \Magento\Newsletter\Model\Subscriber
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadByCustomer');
        return $pluginInfo ? $this->___callPlugins('loadByCustomer', func_get_args(), $pluginInfo) : parent::loadByCustomer($customerId, $websiteId);
    }

    /**
     * {@inheritdoc}
     */
    public function randomSequence($length = 32)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'randomSequence');
        return $pluginInfo ? $this->___callPlugins('randomSequence', func_get_args(), $pluginInfo) : parent::randomSequence($length);
    }

    /**
     * {@inheritdoc}
     */
    public function unsubscribe()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'unsubscribe');
        return $pluginInfo ? $this->___callPlugins('unsubscribe', func_get_args(), $pluginInfo) : parent::unsubscribe();
    }

    /**
     * {@inheritdoc}
     */
    public function confirm($code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'confirm');
        return $pluginInfo ? $this->___callPlugins('confirm', func_get_args(), $pluginInfo) : parent::confirm($code);
    }

    /**
     * {@inheritdoc}
     */
    public function received(\Magento\Newsletter\Model\Queue $queue)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'received');
        return $pluginInfo ? $this->___callPlugins('received', func_get_args(), $pluginInfo) : parent::received($queue);
    }

    /**
     * {@inheritdoc}
     */
    public function sendConfirmationRequestEmail()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'sendConfirmationRequestEmail');
        return $pluginInfo ? $this->___callPlugins('sendConfirmationRequestEmail', func_get_args(), $pluginInfo) : parent::sendConfirmationRequestEmail();
    }

    /**
     * {@inheritdoc}
     */
    public function sendConfirmationSuccessEmail()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'sendConfirmationSuccessEmail');
        return $pluginInfo ? $this->___callPlugins('sendConfirmationSuccessEmail', func_get_args(), $pluginInfo) : parent::sendConfirmationSuccessEmail();
    }

    /**
     * {@inheritdoc}
     */
    public function sendUnsubscriptionEmail()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'sendUnsubscriptionEmail');
        return $pluginInfo ? $this->___callPlugins('sendUnsubscriptionEmail', func_get_args(), $pluginInfo) : parent::sendUnsubscriptionEmail();
    }

    /**
     * {@inheritdoc}
     */
    public function getSubscriberFullName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSubscriberFullName');
        return $pluginInfo ? $this->___callPlugins('getSubscriberFullName', func_get_args(), $pluginInfo) : parent::getSubscriberFullName();
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
    public function loadByEmail($subscriberEmail)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadByEmail');
        return $pluginInfo ? $this->___callPlugins('loadByEmail', func_get_args(), $pluginInfo) : parent::loadByEmail($subscriberEmail);
    }

    /**
     * {@inheritdoc}
     */
    public function loadByCustomerId($customerId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'loadByCustomerId');
        return $pluginInfo ? $this->___callPlugins('loadByCustomerId', func_get_args(), $pluginInfo) : parent::loadByCustomerId($customerId);
    }

    /**
     * {@inheritdoc}
     */
    public function subscribe($email)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'subscribe');
        return $pluginInfo ? $this->___callPlugins('subscribe', func_get_args(), $pluginInfo) : parent::subscribe($email);
    }

    /**
     * {@inheritdoc}
     */
    public function subscribeCustomerById($customerId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'subscribeCustomerById');
        return $pluginInfo ? $this->___callPlugins('subscribeCustomerById', func_get_args(), $pluginInfo) : parent::subscribeCustomerById($customerId);
    }

    /**
     * {@inheritdoc}
     */
    public function unsubscribeCustomerById($customerId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'unsubscribeCustomerById');
        return $pluginInfo ? $this->___callPlugins('unsubscribeCustomerById', func_get_args(), $pluginInfo) : parent::unsubscribeCustomerById($customerId);
    }

    /**
     * {@inheritdoc}
     */
    public function updateSubscription($customerId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'updateSubscription');
        return $pluginInfo ? $this->___callPlugins('updateSubscription', func_get_args(), $pluginInfo) : parent::updateSubscription($customerId);
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
    public function getData($key = '', $index = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getData');
        return $pluginInfo ? $this->___callPlugins('getData', func_get_args(), $pluginInfo) : parent::getData($key, $index);
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
