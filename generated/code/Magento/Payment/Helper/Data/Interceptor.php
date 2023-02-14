<?php
namespace Magento\Payment\Helper\Data;

/**
 * Interceptor class for @see \Magento\Payment\Helper\Data
 */
class Interceptor extends \Magento\Payment\Helper\Data implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Helper\Context $context, \Magento\Framework\View\LayoutFactory $layoutFactory, \Magento\Payment\Model\Method\Factory $paymentMethodFactory, \Magento\Store\Model\App\Emulation $appEmulation, \Magento\Payment\Model\Config $paymentConfig, \Magento\Framework\App\Config\Initial $initialConfig)
    {
        $this->___init();
        parent::__construct($context, $layoutFactory, $paymentMethodFactory, $appEmulation, $paymentConfig, $initialConfig);
    }

    /**
     * {@inheritdoc}
     */
    public function getMethodInstance($code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getMethodInstance');
        return $pluginInfo ? $this->___callPlugins('getMethodInstance', func_get_args(), $pluginInfo) : parent::getMethodInstance($code);
    }

    /**
     * {@inheritdoc}
     */
    public function getStoreMethods($store = null, $quote = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getStoreMethods');
        return $pluginInfo ? $this->___callPlugins('getStoreMethods', func_get_args(), $pluginInfo) : parent::getStoreMethods($store, $quote);
    }

    /**
     * {@inheritdoc}
     */
    public function getMethodFormBlock(\Magento\Payment\Model\MethodInterface $method, \Magento\Framework\View\LayoutInterface $layout)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getMethodFormBlock');
        return $pluginInfo ? $this->___callPlugins('getMethodFormBlock', func_get_args(), $pluginInfo) : parent::getMethodFormBlock($method, $layout);
    }

    /**
     * {@inheritdoc}
     */
    public function getInfoBlock(\Magento\Payment\Model\InfoInterface $info, ?\Magento\Framework\View\LayoutInterface $layout = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getInfoBlock');
        return $pluginInfo ? $this->___callPlugins('getInfoBlock', func_get_args(), $pluginInfo) : parent::getInfoBlock($info, $layout);
    }

    /**
     * {@inheritdoc}
     */
    public function getInfoBlockHtml(\Magento\Payment\Model\InfoInterface $info, $storeId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getInfoBlockHtml');
        return $pluginInfo ? $this->___callPlugins('getInfoBlockHtml', func_get_args(), $pluginInfo) : parent::getInfoBlockHtml($info, $storeId);
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentMethods()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPaymentMethods');
        return $pluginInfo ? $this->___callPlugins('getPaymentMethods', func_get_args(), $pluginInfo) : parent::getPaymentMethods();
    }

    /**
     * {@inheritdoc}
     */
    public function getPaymentMethodList($sorted = true, $asLabelValue = false, $withGroups = false, $store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPaymentMethodList');
        return $pluginInfo ? $this->___callPlugins('getPaymentMethodList', func_get_args(), $pluginInfo) : parent::getPaymentMethodList($sorted, $asLabelValue, $withGroups, $store);
    }

    /**
     * {@inheritdoc}
     */
    public function isZeroSubTotal($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isZeroSubTotal');
        return $pluginInfo ? $this->___callPlugins('isZeroSubTotal', func_get_args(), $pluginInfo) : parent::isZeroSubTotal($store);
    }

    /**
     * {@inheritdoc}
     */
    public function getZeroSubTotalOrderStatus($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getZeroSubTotalOrderStatus');
        return $pluginInfo ? $this->___callPlugins('getZeroSubTotalOrderStatus', func_get_args(), $pluginInfo) : parent::getZeroSubTotalOrderStatus($store);
    }

    /**
     * {@inheritdoc}
     */
    public function getZeroSubTotalPaymentAutomaticInvoice($store = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getZeroSubTotalPaymentAutomaticInvoice');
        return $pluginInfo ? $this->___callPlugins('getZeroSubTotalPaymentAutomaticInvoice', func_get_args(), $pluginInfo) : parent::getZeroSubTotalPaymentAutomaticInvoice($store);
    }

    /**
     * {@inheritdoc}
     */
    public function isModuleOutputEnabled($moduleName = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isModuleOutputEnabled');
        return $pluginInfo ? $this->___callPlugins('isModuleOutputEnabled', func_get_args(), $pluginInfo) : parent::isModuleOutputEnabled($moduleName);
    }
}
