<?php
namespace Magento\MediaGallerySynchronizationApi\Model\ImportFilesComposite;

/**
 * Interceptor class for @see \Magento\MediaGallerySynchronizationApi\Model\ImportFilesComposite
 */
class Interceptor extends \Magento\MediaGallerySynchronizationApi\Model\ImportFilesComposite implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(array $importers)
    {
        $this->___init();
        parent::__construct($importers);
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
