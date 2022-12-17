<?php
namespace Magento\Webapi\Controller\Rest;

/**
 * Interceptor class for @see \Magento\Webapi\Controller\Rest
 */
class Interceptor extends \Magento\Webapi\Controller\Rest implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Webapi\Rest\Request $request, \Magento\Framework\Webapi\Rest\Response $response, \Magento\Webapi\Controller\Rest\Router $router, \Magento\Framework\ObjectManagerInterface $objectManager, \Magento\Framework\App\State $appState, \Magento\Framework\Webapi\Authorization $authorization, \Magento\Framework\Webapi\ServiceInputProcessor $serviceInputProcessor, \Magento\Framework\Webapi\ErrorProcessor $errorProcessor, \Magento\Webapi\Controller\PathProcessor $pathProcessor, \Magento\Framework\App\AreaList $areaList, \Magento\Webapi\Controller\Rest\ParamsOverrider $paramsOverrider, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Webapi\Controller\Rest\RequestProcessorPool $requestProcessorPool)
    {
        $this->___init();
        parent::__construct($request, $response, $router, $objectManager, $appState, $authorization, $serviceInputProcessor, $errorProcessor, $pathProcessor, $areaList, $paramsOverrider, $storeManager, $requestProcessorPool);
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
