<?php
namespace Magento\Webapi\Controller\Rest\InputParamsResolver;

/**
 * Interceptor class for @see \Magento\Webapi\Controller\Rest\InputParamsResolver
 */
class Interceptor extends \Magento\Webapi\Controller\Rest\InputParamsResolver implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Webapi\Rest\Request $request, \Magento\Webapi\Controller\Rest\ParamsOverrider $paramsOverrider, \Magento\Framework\Webapi\ServiceInputProcessor $serviceInputProcessor, \Magento\Webapi\Controller\Rest\Router $router, \Magento\Webapi\Controller\Rest\RequestValidator $requestValidator)
    {
        $this->___init();
        parent::__construct($request, $paramsOverrider, $serviceInputProcessor, $router, $requestValidator);
    }

    /**
     * {@inheritdoc}
     */
    public function resolve()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resolve');
        return $pluginInfo ? $this->___callPlugins('resolve', func_get_args(), $pluginInfo) : parent::resolve();
    }

    /**
     * {@inheritdoc}
     */
    public function getInputData()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getInputData');
        return $pluginInfo ? $this->___callPlugins('getInputData', func_get_args(), $pluginInfo) : parent::getInputData();
    }

    /**
     * {@inheritdoc}
     */
    public function getRoute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRoute');
        return $pluginInfo ? $this->___callPlugins('getRoute', func_get_args(), $pluginInfo) : parent::getRoute();
    }
}
