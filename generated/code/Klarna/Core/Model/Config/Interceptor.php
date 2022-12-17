<?php
namespace Klarna\Core\Model\Config;

/**
 * Interceptor class for @see \Klarna\Core\Model\Config
 */
class Interceptor extends \Klarna\Core\Model\Config implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig)
    {
        $this->___init();
        parent::__construct($scopeConfig);
    }

    /**
     * {@inheritdoc}
     */
    public function storeAddressSet($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'storeAddressSet');
        return $pluginInfo ? $this->___callPlugins('storeAddressSet', func_get_args(), $pluginInfo) : parent::storeAddressSet($store);
    }

    /**
     * {@inheritdoc}
     */
    public function debugModeWhileLive($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'debugModeWhileLive');
        return $pluginInfo ? $this->___callPlugins('debugModeWhileLive', func_get_args(), $pluginInfo) : parent::debugModeWhileLive($store);
    }

    /**
     * {@inheritdoc}
     */
    public function testMode($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'testMode');
        return $pluginInfo ? $this->___callPlugins('testMode', func_get_args(), $pluginInfo) : parent::testMode($store);
    }

    /**
     * {@inheritdoc}
     */
    public function debugMode($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'debugMode');
        return $pluginInfo ? $this->___callPlugins('debugMode', func_get_args(), $pluginInfo) : parent::debugMode($store);
    }

    /**
     * {@inheritdoc}
     */
    public function requiredRegions()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'requiredRegions');
        return $pluginInfo ? $this->___callPlugins('requiredRegions', func_get_args(), $pluginInfo) : parent::requiredRegions();
    }

    /**
     * {@inheritdoc}
     */
    public function klarnaEnabled($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'klarnaEnabled');
        return $pluginInfo ? $this->___callPlugins('klarnaEnabled', func_get_args(), $pluginInfo) : parent::klarnaEnabled($store);
    }
}
