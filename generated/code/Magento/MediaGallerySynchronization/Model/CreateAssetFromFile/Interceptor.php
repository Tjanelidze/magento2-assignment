<?php
namespace Magento\MediaGallerySynchronization\Model\CreateAssetFromFile;

/**
 * Interceptor class for @see \Magento\MediaGallerySynchronization\Model\CreateAssetFromFile
 */
class Interceptor extends \Magento\MediaGallerySynchronization\Model\CreateAssetFromFile implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Filesystem $filesystem, \Magento\Framework\Filesystem\Driver\File $driver, \Magento\MediaGalleryApi\Api\Data\AssetInterfaceFactory $assetFactory, \Magento\MediaGallerySynchronization\Model\GetContentHash $getContentHash, \Magento\MediaGallerySynchronization\Model\Filesystem\GetFileInfo $getFileInfo)
    {
        $this->___init();
        parent::__construct($filesystem, $driver, $assetFactory, $getContentHash, $getFileInfo);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(string $path) : \Magento\MediaGalleryApi\Api\Data\AssetInterface
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute($path);
    }
}
