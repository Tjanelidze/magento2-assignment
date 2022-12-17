<?php
namespace Magento\Widget\Model\Widget;

/**
 * Interceptor class for @see \Magento\Widget\Model\Widget
 */
class Interceptor extends \Magento\Widget\Model\Widget implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Escaper $escaper, \Magento\Widget\Model\Config\Data $dataStorage, \Magento\Framework\View\Asset\Repository $assetRepo, \Magento\Framework\View\Asset\Source $assetSource, \Magento\Framework\View\FileSystem $viewFileSystem, \Magento\Widget\Helper\Conditions $conditionsHelper)
    {
        $this->___init();
        parent::__construct($escaper, $dataStorage, $assetRepo, $assetSource, $viewFileSystem, $conditionsHelper);
    }

    /**
     * {@inheritdoc}
     */
    public function getWidgetByClassType($type)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getWidgetByClassType');
        return $pluginInfo ? $this->___callPlugins('getWidgetByClassType', func_get_args(), $pluginInfo) : parent::getWidgetByClassType($type);
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigAsXml($type)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getConfigAsXml');
        return $pluginInfo ? $this->___callPlugins('getConfigAsXml', func_get_args(), $pluginInfo) : parent::getConfigAsXml($type);
    }

    /**
     * {@inheritdoc}
     */
    public function getConfigAsObject($type)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getConfigAsObject');
        return $pluginInfo ? $this->___callPlugins('getConfigAsObject', func_get_args(), $pluginInfo) : parent::getConfigAsObject($type);
    }

    /**
     * {@inheritdoc}
     */
    public function getWidgets($filters = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getWidgets');
        return $pluginInfo ? $this->___callPlugins('getWidgets', func_get_args(), $pluginInfo) : parent::getWidgets($filters);
    }

    /**
     * {@inheritdoc}
     */
    public function getWidgetsArray($filters = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getWidgetsArray');
        return $pluginInfo ? $this->___callPlugins('getWidgetsArray', func_get_args(), $pluginInfo) : parent::getWidgetsArray($filters);
    }

    /**
     * {@inheritdoc}
     */
    public function getWidgetDeclaration($type, $params = [], $asIs = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getWidgetDeclaration');
        return $pluginInfo ? $this->___callPlugins('getWidgetDeclaration', func_get_args(), $pluginInfo) : parent::getWidgetDeclaration($type, $params, $asIs);
    }

    /**
     * {@inheritdoc}
     */
    public function getPlaceholderImageUrl($type)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPlaceholderImageUrl');
        return $pluginInfo ? $this->___callPlugins('getPlaceholderImageUrl', func_get_args(), $pluginInfo) : parent::getPlaceholderImageUrl($type);
    }

    /**
     * {@inheritdoc}
     */
    public function getPlaceholderImageUrls()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPlaceholderImageUrls');
        return $pluginInfo ? $this->___callPlugins('getPlaceholderImageUrls', func_get_args(), $pluginInfo) : parent::getPlaceholderImageUrls();
    }
}
