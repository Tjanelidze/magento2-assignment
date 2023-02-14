<?php
namespace Magento\Backend\Block\Widget\Button\Toolbar;

/**
 * Interceptor class for @see \Magento\Backend\Block\Widget\Button\Toolbar
 */
class Interceptor extends \Magento\Backend\Block\Widget\Button\Toolbar implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct()
    {
        $this->___init();
    }

    /**
     * {@inheritdoc}
     */
    public function pushButtons(\Magento\Framework\View\Element\AbstractBlock $context, \Magento\Backend\Block\Widget\Button\ButtonList $buttonList)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'pushButtons');
        return $pluginInfo ? $this->___callPlugins('pushButtons', func_get_args(), $pluginInfo) : parent::pushButtons($context, $buttonList);
    }
}
