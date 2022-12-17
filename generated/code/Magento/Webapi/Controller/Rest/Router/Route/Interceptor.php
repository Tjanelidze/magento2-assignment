<?php
namespace Magento\Webapi\Controller\Rest\Router\Route;

/**
 * Interceptor class for @see \Magento\Webapi\Controller\Rest\Router\Route
 */
class Interceptor extends \Magento\Webapi\Controller\Rest\Router\Route implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct($route = '')
    {
        $this->___init();
        parent::__construct($route);
    }

    /**
     * {@inheritdoc}
     */
    public function match(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'match');
        return $pluginInfo ? $this->___callPlugins('match', func_get_args(), $pluginInfo) : parent::match($request);
    }

    /**
     * {@inheritdoc}
     */
    public function setServiceClass($serviceClass)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setServiceClass');
        return $pluginInfo ? $this->___callPlugins('setServiceClass', func_get_args(), $pluginInfo) : parent::setServiceClass($serviceClass);
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceClass()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getServiceClass');
        return $pluginInfo ? $this->___callPlugins('getServiceClass', func_get_args(), $pluginInfo) : parent::getServiceClass();
    }

    /**
     * {@inheritdoc}
     */
    public function setServiceMethod($serviceMethod)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setServiceMethod');
        return $pluginInfo ? $this->___callPlugins('setServiceMethod', func_get_args(), $pluginInfo) : parent::setServiceMethod($serviceMethod);
    }

    /**
     * {@inheritdoc}
     */
    public function getServiceMethod()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getServiceMethod');
        return $pluginInfo ? $this->___callPlugins('getServiceMethod', func_get_args(), $pluginInfo) : parent::getServiceMethod();
    }

    /**
     * {@inheritdoc}
     */
    public function setSecure($secure)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setSecure');
        return $pluginInfo ? $this->___callPlugins('setSecure', func_get_args(), $pluginInfo) : parent::setSecure($secure);
    }

    /**
     * {@inheritdoc}
     */
    public function isSecure()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isSecure');
        return $pluginInfo ? $this->___callPlugins('isSecure', func_get_args(), $pluginInfo) : parent::isSecure();
    }

    /**
     * {@inheritdoc}
     */
    public function setAclResources($aclResources)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAclResources');
        return $pluginInfo ? $this->___callPlugins('setAclResources', func_get_args(), $pluginInfo) : parent::setAclResources($aclResources);
    }

    /**
     * {@inheritdoc}
     */
    public function getAclResources()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAclResources');
        return $pluginInfo ? $this->___callPlugins('getAclResources', func_get_args(), $pluginInfo) : parent::getAclResources();
    }

    /**
     * {@inheritdoc}
     */
    public function setParameters($parameters)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setParameters');
        return $pluginInfo ? $this->___callPlugins('setParameters', func_get_args(), $pluginInfo) : parent::setParameters($parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getParameters');
        return $pluginInfo ? $this->___callPlugins('getParameters', func_get_args(), $pluginInfo) : parent::getParameters();
    }

    /**
     * {@inheritdoc}
     */
    public function getRoutePath()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRoutePath');
        return $pluginInfo ? $this->___callPlugins('getRoutePath', func_get_args(), $pluginInfo) : parent::getRoutePath();
    }
}
