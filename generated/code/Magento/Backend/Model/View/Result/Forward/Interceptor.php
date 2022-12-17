<?php
namespace Magento\Backend\Model\View\Result\Forward;

/**
 * Interceptor class for @see \Magento\Backend\Model\View\Result\Forward
 */
class Interceptor extends \Magento\Backend\Model\View\Result\Forward implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\RequestInterface $request, \Magento\Backend\Model\Session $session, \Magento\Framework\App\ActionFlag $actionFlag)
    {
        $this->___init();
        parent::__construct($request, $session, $actionFlag);
    }

    /**
     * {@inheritdoc}
     */
    public function forward($action)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'forward');
        return $pluginInfo ? $this->___callPlugins('forward', func_get_args(), $pluginInfo) : parent::forward($action);
    }

    /**
     * {@inheritdoc}
     */
    public function setModule($module)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setModule');
        return $pluginInfo ? $this->___callPlugins('setModule', func_get_args(), $pluginInfo) : parent::setModule($module);
    }

    /**
     * {@inheritdoc}
     */
    public function setController($controller)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setController');
        return $pluginInfo ? $this->___callPlugins('setController', func_get_args(), $pluginInfo) : parent::setController($controller);
    }

    /**
     * {@inheritdoc}
     */
    public function setParams(array $params)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setParams');
        return $pluginInfo ? $this->___callPlugins('setParams', func_get_args(), $pluginInfo) : parent::setParams($params);
    }

    /**
     * {@inheritdoc}
     */
    public function setHttpResponseCode($httpCode)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHttpResponseCode');
        return $pluginInfo ? $this->___callPlugins('setHttpResponseCode', func_get_args(), $pluginInfo) : parent::setHttpResponseCode($httpCode);
    }

    /**
     * {@inheritdoc}
     */
    public function setHeader($name, $value, $replace = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHeader');
        return $pluginInfo ? $this->___callPlugins('setHeader', func_get_args(), $pluginInfo) : parent::setHeader($name, $value, $replace);
    }

    /**
     * {@inheritdoc}
     */
    public function setStatusHeader($httpCode, $version = null, $phrase = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setStatusHeader');
        return $pluginInfo ? $this->___callPlugins('setStatusHeader', func_get_args(), $pluginInfo) : parent::setStatusHeader($httpCode, $version, $phrase);
    }

    /**
     * {@inheritdoc}
     */
    public function renderResult(\Magento\Framework\App\ResponseInterface $response)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'renderResult');
        return $pluginInfo ? $this->___callPlugins('renderResult', func_get_args(), $pluginInfo) : parent::renderResult($response);
    }
}
