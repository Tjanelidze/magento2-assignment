<?php
namespace Magento\MediaGallery\Model\ResourceModel\DeleteAssetsByPaths;

/**
 * Interceptor class for @see \Magento\MediaGallery\Model\ResourceModel\DeleteAssetsByPaths
 */
class Interceptor extends \Magento\MediaGallery\Model\ResourceModel\DeleteAssetsByPaths implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\ResourceConnection $resourceConnection, \Psr\Log\LoggerInterface $logger)
    {
        $this->___init();
        parent::__construct($resourceConnection, $logger);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(array $paths) : void
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute($paths);
    }
}
