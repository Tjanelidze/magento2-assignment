<?php
namespace Magento\Sales\Model\ResourceModel\Order\Handler\Address;

/**
 * Interceptor class for @see \Magento\Sales\Model\ResourceModel\Order\Handler\Address
 */
class Interceptor extends \Magento\Sales\Model\ResourceModel\Order\Handler\Address implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Sales\Model\ResourceModel\Attribute $attribute)
    {
        $this->___init();
        parent::__construct($attribute);
    }

    /**
     * {@inheritdoc}
     */
    public function removeEmptyAddresses(\Magento\Sales\Model\Order $order)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removeEmptyAddresses');
        return $pluginInfo ? $this->___callPlugins('removeEmptyAddresses', func_get_args(), $pluginInfo) : parent::removeEmptyAddresses($order);
    }

    /**
     * {@inheritdoc}
     */
    public function process(\Magento\Sales\Model\Order $order)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'process');
        return $pluginInfo ? $this->___callPlugins('process', func_get_args(), $pluginInfo) : parent::process($order);
    }
}
