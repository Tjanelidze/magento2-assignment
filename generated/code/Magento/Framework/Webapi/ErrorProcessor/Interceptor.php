<?php
namespace Magento\Framework\Webapi\ErrorProcessor;

/**
 * Interceptor class for @see \Magento\Framework\Webapi\ErrorProcessor
 */
class Interceptor extends \Magento\Framework\Webapi\ErrorProcessor implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Json\Encoder $encoder, \Magento\Framework\App\State $appState, \Psr\Log\LoggerInterface $logger, \Magento\Framework\Filesystem $filesystem, ?\Magento\Framework\Serialize\Serializer\Json $serializer = null)
    {
        $this->___init();
        parent::__construct($encoder, $appState, $logger, $filesystem, $serializer);
    }

    /**
     * {@inheritdoc}
     */
    public function maskException(\Exception $exception)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'maskException');
        return $pluginInfo ? $this->___callPlugins('maskException', func_get_args(), $pluginInfo) : parent::maskException($exception);
    }

    /**
     * {@inheritdoc}
     */
    public function renderException(\Exception $exception, $httpCode = 500)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'renderException');
        return $pluginInfo ? $this->___callPlugins('renderException', func_get_args(), $pluginInfo) : parent::renderException($exception, $httpCode);
    }

    /**
     * {@inheritdoc}
     */
    public function renderErrorMessage($errorMessage, $trace = 'Trace is not available.', $httpCode = 500)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'renderErrorMessage');
        return $pluginInfo ? $this->___callPlugins('renderErrorMessage', func_get_args(), $pluginInfo) : parent::renderErrorMessage($errorMessage, $trace, $httpCode);
    }

    /**
     * {@inheritdoc}
     */
    public function registerShutdownFunction()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'registerShutdownFunction');
        return $pluginInfo ? $this->___callPlugins('registerShutdownFunction', func_get_args(), $pluginInfo) : parent::registerShutdownFunction();
    }

    /**
     * {@inheritdoc}
     */
    public function apiShutdownFunction()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'apiShutdownFunction');
        return $pluginInfo ? $this->___callPlugins('apiShutdownFunction', func_get_args(), $pluginInfo) : parent::apiShutdownFunction();
    }
}
