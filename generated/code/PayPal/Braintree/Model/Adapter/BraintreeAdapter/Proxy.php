<?php
namespace PayPal\Braintree\Model\Adapter\BraintreeAdapter;

/**
 * Proxy class for @see \PayPal\Braintree\Model\Adapter\BraintreeAdapter
 */
class Proxy extends \PayPal\Braintree\Model\Adapter\BraintreeAdapter implements \Magento\Framework\ObjectManager\NoninterceptableInterface
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Proxied instance name
     *
     * @var string
     */
    protected $_instanceName = null;

    /**
     * Proxied instance
     *
     * @var \PayPal\Braintree\Model\Adapter\BraintreeAdapter
     */
    protected $_subject = null;

    /**
     * Instance shareability flag
     *
     * @var bool
     */
    protected $_isShared = null;

    /**
     * Proxy constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $instanceName
     * @param bool $shared
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\PayPal\\Braintree\\Model\\Adapter\\BraintreeAdapter', $shared = true)
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
        $this->_isShared = $shared;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return ['_subject', '_isShared', '_instanceName'];
    }

    /**
     * Retrieve ObjectManager from global scope
     */
    public function __wakeup()
    {
        $this->_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    }

    /**
     * Clone proxied instance
     */
    public function __clone()
    {
        $this->_subject = clone $this->_getSubject();
    }

    /**
     * Get proxied instance
     *
     * @return \PayPal\Braintree\Model\Adapter\BraintreeAdapter
     */
    protected function _getSubject()
    {
        if (!$this->_subject) {
            $this->_subject = true === $this->_isShared
                ? $this->_objectManager->get($this->_instanceName)
                : $this->_objectManager->create($this->_instanceName);
        }
        return $this->_subject;
    }

    /**
     * {@inheritdoc}
     */
    public function environment($value = null)
    {
        return $this->_getSubject()->environment($value);
    }

    /**
     * {@inheritdoc}
     */
    public function merchantId($value = null)
    {
        return $this->_getSubject()->merchantId($value);
    }

    /**
     * {@inheritdoc}
     */
    public function publicKey($value = null)
    {
        return $this->_getSubject()->publicKey($value);
    }

    /**
     * {@inheritdoc}
     */
    public function privateKey($value = null)
    {
        return $this->_getSubject()->privateKey($value);
    }

    /**
     * {@inheritdoc}
     */
    public function generate(array $params = [])
    {
        return $this->_getSubject()->generate($params);
    }

    /**
     * {@inheritdoc}
     */
    public function find($token)
    {
        return $this->_getSubject()->find($token);
    }

    /**
     * {@inheritdoc}
     */
    public function search(array $filters)
    {
        return $this->_getSubject()->search($filters);
    }

    /**
     * {@inheritdoc}
     */
    public function findById(string $id)
    {
        return $this->_getSubject()->findById($id);
    }

    /**
     * {@inheritdoc}
     */
    public function createNonce($token)
    {
        return $this->_getSubject()->createNonce($token);
    }

    /**
     * {@inheritdoc}
     */
    public function sale(array $attributes)
    {
        return $this->_getSubject()->sale($attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForSettlement($transactionId, $amount = null)
    {
        return $this->_getSubject()->submitForSettlement($transactionId, $amount);
    }

    /**
     * {@inheritdoc}
     */
    public function submitForPartialSettlement($transactionId, $amount = null)
    {
        return $this->_getSubject()->submitForPartialSettlement($transactionId, $amount);
    }

    /**
     * {@inheritdoc}
     */
    public function void($transactionId)
    {
        return $this->_getSubject()->void($transactionId);
    }

    /**
     * {@inheritdoc}
     */
    public function refund($transactionId, $amount = null)
    {
        return $this->_getSubject()->refund($transactionId, $amount);
    }

    /**
     * {@inheritdoc}
     */
    public function cloneTransaction($transactionId, array $attributes)
    {
        return $this->_getSubject()->cloneTransaction($transactionId, $attributes);
    }

    /**
     * {@inheritdoc}
     */
    public function deletePaymentMethod($token)
    {
        return $this->_getSubject()->deletePaymentMethod($token);
    }

    /**
     * {@inheritdoc}
     */
    public function updatePaymentMethod($token, $attribs)
    {
        return $this->_getSubject()->updatePaymentMethod($token, $attribs);
    }

    /**
     * {@inheritdoc}
     */
    public function getCustomerById($id)
    {
        return $this->_getSubject()->getCustomerById($id);
    }
}
