<?php
namespace Magento\Backend\Block\Dashboard\Grids;

/**
 * Interceptor class for @see \Magento\Backend\Block\Dashboard\Grids
 */
class Interceptor extends \Magento\Backend\Block\Dashboard\Grids implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\Block\Template\Context $context, \Magento\Framework\Json\EncoderInterface $jsonEncoder, \Magento\Backend\Model\Auth\Session $authSession, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $jsonEncoder, $authSession, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getDestElementId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDestElementId');
        return $pluginInfo ? $this->___callPlugins('getDestElementId', func_get_args(), $pluginInfo) : parent::getDestElementId();
    }

    /**
     * {@inheritdoc}
     */
    public function setDestElementId($elementId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDestElementId');
        return $pluginInfo ? $this->___callPlugins('setDestElementId', func_get_args(), $pluginInfo) : parent::setDestElementId($elementId);
    }

    /**
     * {@inheritdoc}
     */
    public function addTabAfter($tabId, $tab, $afterTabId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addTabAfter');
        return $pluginInfo ? $this->___callPlugins('addTabAfter', func_get_args(), $pluginInfo) : parent::addTabAfter($tabId, $tab, $afterTabId);
    }

    /**
     * {@inheritdoc}
     */
    public function addTab($tabId, $tab)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addTab');
        return $pluginInfo ? $this->___callPlugins('addTab', func_get_args(), $pluginInfo) : parent::addTab($tabId, $tab);
    }

    /**
     * {@inheritdoc}
     */
    public function getActiveTabId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getActiveTabId');
        return $pluginInfo ? $this->___callPlugins('getActiveTabId', func_get_args(), $pluginInfo) : parent::getActiveTabId();
    }

    /**
     * {@inheritdoc}
     */
    public function setActiveTab($tabId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setActiveTab');
        return $pluginInfo ? $this->___callPlugins('setActiveTab', func_get_args(), $pluginInfo) : parent::setActiveTab($tabId);
    }

    /**
     * {@inheritdoc}
     */
    public function getJsObjectName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getJsObjectName');
        return $pluginInfo ? $this->___callPlugins('getJsObjectName', func_get_args(), $pluginInfo) : parent::getJsObjectName();
    }

    /**
     * {@inheritdoc}
     */
    public function getTabsIds()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTabsIds');
        return $pluginInfo ? $this->___callPlugins('getTabsIds', func_get_args(), $pluginInfo) : parent::getTabsIds();
    }

    /**
     * {@inheritdoc}
     */
    public function getTabId($tab, $withPrefix = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTabId');
        return $pluginInfo ? $this->___callPlugins('getTabId', func_get_args(), $pluginInfo) : parent::getTabId($tab, $withPrefix);
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab($tab)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canShowTab');
        return $pluginInfo ? $this->___callPlugins('canShowTab', func_get_args(), $pluginInfo) : parent::canShowTab($tab);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabIsHidden($tab)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTabIsHidden');
        return $pluginInfo ? $this->___callPlugins('getTabIsHidden', func_get_args(), $pluginInfo) : parent::getTabIsHidden($tab);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabUrl($tab)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTabUrl');
        return $pluginInfo ? $this->___callPlugins('getTabUrl', func_get_args(), $pluginInfo) : parent::getTabUrl($tab);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle($tab)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTabTitle');
        return $pluginInfo ? $this->___callPlugins('getTabTitle', func_get_args(), $pluginInfo) : parent::getTabTitle($tab);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabClass($tab)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTabClass');
        return $pluginInfo ? $this->___callPlugins('getTabClass', func_get_args(), $pluginInfo) : parent::getTabClass($tab);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel($tab)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTabLabel');
        return $pluginInfo ? $this->___callPlugins('getTabLabel', func_get_args(), $pluginInfo) : parent::getTabLabel($tab);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabContent($tab)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTabContent');
        return $pluginInfo ? $this->___callPlugins('getTabContent', func_get_args(), $pluginInfo) : parent::getTabContent($tab);
    }

    /**
     * {@inheritdoc}
     */
    public function bindShadowTabs($tabOneId, $tabTwoId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'bindShadowTabs');
        return $pluginInfo ? $this->___callPlugins('bindShadowTabs', func_get_args(), $pluginInfo) : parent::bindShadowTabs($tabOneId, $tabTwoId);
    }

    /**
     * {@inheritdoc}
     */
    public function getAllShadowTabs($asJson = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllShadowTabs');
        return $pluginInfo ? $this->___callPlugins('getAllShadowTabs', func_get_args(), $pluginInfo) : parent::getAllShadowTabs($asJson);
    }

    /**
     * {@inheritdoc}
     */
    public function setTabData($tab, $key, $value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTabData');
        return $pluginInfo ? $this->___callPlugins('setTabData', func_get_args(), $pluginInfo) : parent::setTabData($tab, $key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function removeTab($tabId)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removeTab');
        return $pluginInfo ? $this->___callPlugins('removeTab', func_get_args(), $pluginInfo) : parent::removeTab($tabId);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getId');
        return $pluginInfo ? $this->___callPlugins('getId', func_get_args(), $pluginInfo) : parent::getId();
    }

    /**
     * {@inheritdoc}
     */
    public function getSuffixId($suffix)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSuffixId');
        return $pluginInfo ? $this->___callPlugins('getSuffixId', func_get_args(), $pluginInfo) : parent::getSuffixId($suffix);
    }

    /**
     * {@inheritdoc}
     */
    public function getHtmlId()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHtmlId');
        return $pluginInfo ? $this->___callPlugins('getHtmlId', func_get_args(), $pluginInfo) : parent::getHtmlId();
    }

    /**
     * {@inheritdoc}
     */
    public function getCurrentUrl($params = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCurrentUrl');
        return $pluginInfo ? $this->___callPlugins('getCurrentUrl', func_get_args(), $pluginInfo) : parent::getCurrentUrl($params);
    }

    /**
     * {@inheritdoc}
     */
    public function getButtonHtml($label, $onclick, $class = '', $buttonId = null, $dataAttr = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getButtonHtml');
        return $pluginInfo ? $this->___callPlugins('getButtonHtml', func_get_args(), $pluginInfo) : parent::getButtonHtml($label, $onclick, $class, $buttonId, $dataAttr);
    }

    /**
     * {@inheritdoc}
     */
    public function getFormKey()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getFormKey');
        return $pluginInfo ? $this->___callPlugins('getFormKey', func_get_args(), $pluginInfo) : parent::getFormKey();
    }

    /**
     * {@inheritdoc}
     */
    public function isOutputEnabled($moduleName = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isOutputEnabled');
        return $pluginInfo ? $this->___callPlugins('isOutputEnabled', func_get_args(), $pluginInfo) : parent::isOutputEnabled($moduleName);
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthorization()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAuthorization');
        return $pluginInfo ? $this->___callPlugins('getAuthorization', func_get_args(), $pluginInfo) : parent::getAuthorization();
    }

    /**
     * {@inheritdoc}
     */
    public function getToolbar()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getToolbar');
        return $pluginInfo ? $this->___callPlugins('getToolbar', func_get_args(), $pluginInfo) : parent::getToolbar();
    }

    /**
     * {@inheritdoc}
     */
    public function setTemplateContext($templateContext)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTemplateContext');
        return $pluginInfo ? $this->___callPlugins('setTemplateContext', func_get_args(), $pluginInfo) : parent::setTemplateContext($templateContext);
    }

    /**
     * {@inheritdoc}
     */
    public function getTemplate()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTemplate');
        return $pluginInfo ? $this->___callPlugins('getTemplate', func_get_args(), $pluginInfo) : parent::getTemplate();
    }

    /**
     * {@inheritdoc}
     */
    public function setTemplate($template)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setTemplate');
        return $pluginInfo ? $this->___callPlugins('setTemplate', func_get_args(), $pluginInfo) : parent::setTemplate($template);
    }

    /**
     * {@inheritdoc}
     */
    public function getTemplateFile($template = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTemplateFile');
        return $pluginInfo ? $this->___callPlugins('getTemplateFile', func_get_args(), $pluginInfo) : parent::getTemplateFile($template);
    }

    /**
     * {@inheritdoc}
     */
    public function getArea()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getArea');
        return $pluginInfo ? $this->___callPlugins('getArea', func_get_args(), $pluginInfo) : parent::getArea();
    }

    /**
     * {@inheritdoc}
     */
    public function assign($key, $value = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'assign');
        return $pluginInfo ? $this->___callPlugins('assign', func_get_args(), $pluginInfo) : parent::assign($key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function fetchView($fileName)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'fetchView');
        return $pluginInfo ? $this->___callPlugins('fetchView', func_get_args(), $pluginInfo) : parent::fetchView($fileName);
    }

    /**
     * {@inheritdoc}
     */
    public function getBaseUrl()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBaseUrl');
        return $pluginInfo ? $this->___callPlugins('getBaseUrl', func_get_args(), $pluginInfo) : parent::getBaseUrl();
    }

    /**
     * {@inheritdoc}
     */
    public function getObjectData(\Magento\Framework\DataObject $object, $key)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getObjectData');
        return $pluginInfo ? $this->___callPlugins('getObjectData', func_get_args(), $pluginInfo) : parent::getObjectData($object, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheKeyInfo()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCacheKeyInfo');
        return $pluginInfo ? $this->___callPlugins('getCacheKeyInfo', func_get_args(), $pluginInfo) : parent::getCacheKeyInfo();
    }

    /**
     * {@inheritdoc}
     */
    public function getJsLayout()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getJsLayout');
        return $pluginInfo ? $this->___callPlugins('getJsLayout', func_get_args(), $pluginInfo) : parent::getJsLayout();
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRequest');
        return $pluginInfo ? $this->___callPlugins('getRequest', func_get_args(), $pluginInfo) : parent::getRequest();
    }

    /**
     * {@inheritdoc}
     */
    public function getParentBlock()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getParentBlock');
        return $pluginInfo ? $this->___callPlugins('getParentBlock', func_get_args(), $pluginInfo) : parent::getParentBlock();
    }

    /**
     * {@inheritdoc}
     */
    public function setLayout(\Magento\Framework\View\LayoutInterface $layout)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setLayout');
        return $pluginInfo ? $this->___callPlugins('setLayout', func_get_args(), $pluginInfo) : parent::setLayout($layout);
    }

    /**
     * {@inheritdoc}
     */
    public function getLayout()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getLayout');
        return $pluginInfo ? $this->___callPlugins('getLayout', func_get_args(), $pluginInfo) : parent::getLayout();
    }

    /**
     * {@inheritdoc}
     */
    public function setNameInLayout($name)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setNameInLayout');
        return $pluginInfo ? $this->___callPlugins('setNameInLayout', func_get_args(), $pluginInfo) : parent::setNameInLayout($name);
    }

    /**
     * {@inheritdoc}
     */
    public function getChildNames()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getChildNames');
        return $pluginInfo ? $this->___callPlugins('getChildNames', func_get_args(), $pluginInfo) : parent::getChildNames();
    }

    /**
     * {@inheritdoc}
     */
    public function setAttribute($name, $value = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAttribute');
        return $pluginInfo ? $this->___callPlugins('setAttribute', func_get_args(), $pluginInfo) : parent::setAttribute($name, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function setChild($alias, $block)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setChild');
        return $pluginInfo ? $this->___callPlugins('setChild', func_get_args(), $pluginInfo) : parent::setChild($alias, $block);
    }

    /**
     * {@inheritdoc}
     */
    public function addChild($alias, $block, $data = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addChild');
        return $pluginInfo ? $this->___callPlugins('addChild', func_get_args(), $pluginInfo) : parent::addChild($alias, $block, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function unsetChild($alias)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'unsetChild');
        return $pluginInfo ? $this->___callPlugins('unsetChild', func_get_args(), $pluginInfo) : parent::unsetChild($alias);
    }

    /**
     * {@inheritdoc}
     */
    public function unsetCallChild($alias, $callback, $result, $params)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'unsetCallChild');
        return $pluginInfo ? $this->___callPlugins('unsetCallChild', func_get_args(), $pluginInfo) : parent::unsetCallChild($alias, $callback, $result, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function unsetChildren()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'unsetChildren');
        return $pluginInfo ? $this->___callPlugins('unsetChildren', func_get_args(), $pluginInfo) : parent::unsetChildren();
    }

    /**
     * {@inheritdoc}
     */
    public function getChildBlock($alias)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getChildBlock');
        return $pluginInfo ? $this->___callPlugins('getChildBlock', func_get_args(), $pluginInfo) : parent::getChildBlock($alias);
    }

    /**
     * {@inheritdoc}
     */
    public function getChildHtml($alias = '', $useCache = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getChildHtml');
        return $pluginInfo ? $this->___callPlugins('getChildHtml', func_get_args(), $pluginInfo) : parent::getChildHtml($alias, $useCache);
    }

    /**
     * {@inheritdoc}
     */
    public function getChildChildHtml($alias, $childChildAlias = '', $useCache = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getChildChildHtml');
        return $pluginInfo ? $this->___callPlugins('getChildChildHtml', func_get_args(), $pluginInfo) : parent::getChildChildHtml($alias, $childChildAlias, $useCache);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockHtml($name)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getBlockHtml');
        return $pluginInfo ? $this->___callPlugins('getBlockHtml', func_get_args(), $pluginInfo) : parent::getBlockHtml($name);
    }

    /**
     * {@inheritdoc}
     */
    public function insert($element, $siblingName = 0, $after = true, $alias = '')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'insert');
        return $pluginInfo ? $this->___callPlugins('insert', func_get_args(), $pluginInfo) : parent::insert($element, $siblingName, $after, $alias);
    }

    /**
     * {@inheritdoc}
     */
    public function append($element, $alias = '')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'append');
        return $pluginInfo ? $this->___callPlugins('append', func_get_args(), $pluginInfo) : parent::append($element, $alias);
    }

    /**
     * {@inheritdoc}
     */
    public function getGroupChildNames($groupName)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getGroupChildNames');
        return $pluginInfo ? $this->___callPlugins('getGroupChildNames', func_get_args(), $pluginInfo) : parent::getGroupChildNames($groupName);
    }

    /**
     * {@inheritdoc}
     */
    public function getChildData($alias, $key = '')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getChildData');
        return $pluginInfo ? $this->___callPlugins('getChildData', func_get_args(), $pluginInfo) : parent::getChildData($alias, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function toHtml()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toHtml');
        return $pluginInfo ? $this->___callPlugins('toHtml', func_get_args(), $pluginInfo) : parent::toHtml();
    }

    /**
     * {@inheritdoc}
     */
    public function getUiId($arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUiId');
        return $pluginInfo ? $this->___callPlugins('getUiId', func_get_args(), $pluginInfo) : parent::getUiId($arg1, $arg2, $arg3, $arg4, $arg5);
    }

    /**
     * {@inheritdoc}
     */
    public function getJsId($arg1 = null, $arg2 = null, $arg3 = null, $arg4 = null, $arg5 = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getJsId');
        return $pluginInfo ? $this->___callPlugins('getJsId', func_get_args(), $pluginInfo) : parent::getJsId($arg1, $arg2, $arg3, $arg4, $arg5);
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl($route = '', $params = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUrl');
        return $pluginInfo ? $this->___callPlugins('getUrl', func_get_args(), $pluginInfo) : parent::getUrl($route, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function getViewFileUrl($fileId, array $params = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getViewFileUrl');
        return $pluginInfo ? $this->___callPlugins('getViewFileUrl', func_get_args(), $pluginInfo) : parent::getViewFileUrl($fileId, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function formatDate($date = null, $format = 3, $showTime = false, $timezone = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'formatDate');
        return $pluginInfo ? $this->___callPlugins('formatDate', func_get_args(), $pluginInfo) : parent::formatDate($date, $format, $showTime, $timezone);
    }

    /**
     * {@inheritdoc}
     */
    public function formatTime($time = null, $format = 3, $showDate = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'formatTime');
        return $pluginInfo ? $this->___callPlugins('formatTime', func_get_args(), $pluginInfo) : parent::formatTime($time, $format, $showDate);
    }

    /**
     * {@inheritdoc}
     */
    public function getModuleName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getModuleName');
        return $pluginInfo ? $this->___callPlugins('getModuleName', func_get_args(), $pluginInfo) : parent::getModuleName();
    }

    /**
     * {@inheritdoc}
     */
    public function escapeHtml($data, $allowedTags = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'escapeHtml');
        return $pluginInfo ? $this->___callPlugins('escapeHtml', func_get_args(), $pluginInfo) : parent::escapeHtml($data, $allowedTags);
    }

    /**
     * {@inheritdoc}
     */
    public function escapeJs($string)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'escapeJs');
        return $pluginInfo ? $this->___callPlugins('escapeJs', func_get_args(), $pluginInfo) : parent::escapeJs($string);
    }

    /**
     * {@inheritdoc}
     */
    public function escapeHtmlAttr($string, $escapeSingleQuote = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'escapeHtmlAttr');
        return $pluginInfo ? $this->___callPlugins('escapeHtmlAttr', func_get_args(), $pluginInfo) : parent::escapeHtmlAttr($string, $escapeSingleQuote);
    }

    /**
     * {@inheritdoc}
     */
    public function escapeCss($string)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'escapeCss');
        return $pluginInfo ? $this->___callPlugins('escapeCss', func_get_args(), $pluginInfo) : parent::escapeCss($string);
    }

    /**
     * {@inheritdoc}
     */
    public function stripTags($data, $allowableTags = null, $allowHtmlEntities = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'stripTags');
        return $pluginInfo ? $this->___callPlugins('stripTags', func_get_args(), $pluginInfo) : parent::stripTags($data, $allowableTags, $allowHtmlEntities);
    }

    /**
     * {@inheritdoc}
     */
    public function escapeUrl($string)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'escapeUrl');
        return $pluginInfo ? $this->___callPlugins('escapeUrl', func_get_args(), $pluginInfo) : parent::escapeUrl($string);
    }

    /**
     * {@inheritdoc}
     */
    public function escapeXssInUrl($data)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'escapeXssInUrl');
        return $pluginInfo ? $this->___callPlugins('escapeXssInUrl', func_get_args(), $pluginInfo) : parent::escapeXssInUrl($data);
    }

    /**
     * {@inheritdoc}
     */
    public function escapeQuote($data, $addSlashes = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'escapeQuote');
        return $pluginInfo ? $this->___callPlugins('escapeQuote', func_get_args(), $pluginInfo) : parent::escapeQuote($data, $addSlashes);
    }

    /**
     * {@inheritdoc}
     */
    public function escapeJsQuote($data, $quote = '\'')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'escapeJsQuote');
        return $pluginInfo ? $this->___callPlugins('escapeJsQuote', func_get_args(), $pluginInfo) : parent::escapeJsQuote($data, $quote);
    }

    /**
     * {@inheritdoc}
     */
    public function getNameInLayout()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getNameInLayout');
        return $pluginInfo ? $this->___callPlugins('getNameInLayout', func_get_args(), $pluginInfo) : parent::getNameInLayout();
    }

    /**
     * {@inheritdoc}
     */
    public function getCacheKey()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCacheKey');
        return $pluginInfo ? $this->___callPlugins('getCacheKey', func_get_args(), $pluginInfo) : parent::getCacheKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getVar($name, $module = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getVar');
        return $pluginInfo ? $this->___callPlugins('getVar', func_get_args(), $pluginInfo) : parent::getVar($name, $module);
    }

    /**
     * {@inheritdoc}
     */
    public function isScopePrivate()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isScopePrivate');
        return $pluginInfo ? $this->___callPlugins('isScopePrivate', func_get_args(), $pluginInfo) : parent::isScopePrivate();
    }

    /**
     * {@inheritdoc}
     */
    public function addData(array $arr)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addData');
        return $pluginInfo ? $this->___callPlugins('addData', func_get_args(), $pluginInfo) : parent::addData($arr);
    }

    /**
     * {@inheritdoc}
     */
    public function setData($key, $value = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setData');
        return $pluginInfo ? $this->___callPlugins('setData', func_get_args(), $pluginInfo) : parent::setData($key, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function unsetData($key = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'unsetData');
        return $pluginInfo ? $this->___callPlugins('unsetData', func_get_args(), $pluginInfo) : parent::unsetData($key);
    }

    /**
     * {@inheritdoc}
     */
    public function getData($key = '', $index = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getData');
        return $pluginInfo ? $this->___callPlugins('getData', func_get_args(), $pluginInfo) : parent::getData($key, $index);
    }

    /**
     * {@inheritdoc}
     */
    public function getDataByPath($path)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDataByPath');
        return $pluginInfo ? $this->___callPlugins('getDataByPath', func_get_args(), $pluginInfo) : parent::getDataByPath($path);
    }

    /**
     * {@inheritdoc}
     */
    public function getDataByKey($key)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDataByKey');
        return $pluginInfo ? $this->___callPlugins('getDataByKey', func_get_args(), $pluginInfo) : parent::getDataByKey($key);
    }

    /**
     * {@inheritdoc}
     */
    public function setDataUsingMethod($key, $args = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDataUsingMethod');
        return $pluginInfo ? $this->___callPlugins('setDataUsingMethod', func_get_args(), $pluginInfo) : parent::setDataUsingMethod($key, $args);
    }

    /**
     * {@inheritdoc}
     */
    public function getDataUsingMethod($key, $args = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDataUsingMethod');
        return $pluginInfo ? $this->___callPlugins('getDataUsingMethod', func_get_args(), $pluginInfo) : parent::getDataUsingMethod($key, $args);
    }

    /**
     * {@inheritdoc}
     */
    public function hasData($key = '')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasData');
        return $pluginInfo ? $this->___callPlugins('hasData', func_get_args(), $pluginInfo) : parent::hasData($key);
    }

    /**
     * {@inheritdoc}
     */
    public function toArray(array $keys = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toArray');
        return $pluginInfo ? $this->___callPlugins('toArray', func_get_args(), $pluginInfo) : parent::toArray($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToArray(array $keys = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'convertToArray');
        return $pluginInfo ? $this->___callPlugins('convertToArray', func_get_args(), $pluginInfo) : parent::convertToArray($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function toXml(array $keys = [], $rootName = 'item', $addOpenTag = false, $addCdata = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toXml');
        return $pluginInfo ? $this->___callPlugins('toXml', func_get_args(), $pluginInfo) : parent::toXml($keys, $rootName, $addOpenTag, $addCdata);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToXml(array $arrAttributes = [], $rootName = 'item', $addOpenTag = false, $addCdata = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'convertToXml');
        return $pluginInfo ? $this->___callPlugins('convertToXml', func_get_args(), $pluginInfo) : parent::convertToXml($arrAttributes, $rootName, $addOpenTag, $addCdata);
    }

    /**
     * {@inheritdoc}
     */
    public function toJson(array $keys = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toJson');
        return $pluginInfo ? $this->___callPlugins('toJson', func_get_args(), $pluginInfo) : parent::toJson($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function convertToJson(array $keys = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'convertToJson');
        return $pluginInfo ? $this->___callPlugins('convertToJson', func_get_args(), $pluginInfo) : parent::convertToJson($keys);
    }

    /**
     * {@inheritdoc}
     */
    public function toString($format = '')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'toString');
        return $pluginInfo ? $this->___callPlugins('toString', func_get_args(), $pluginInfo) : parent::toString($format);
    }

    /**
     * {@inheritdoc}
     */
    public function __call($method, $args)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, '__call');
        return $pluginInfo ? $this->___callPlugins('__call', func_get_args(), $pluginInfo) : parent::__call($method, $args);
    }

    /**
     * {@inheritdoc}
     */
    public function isEmpty()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isEmpty');
        return $pluginInfo ? $this->___callPlugins('isEmpty', func_get_args(), $pluginInfo) : parent::isEmpty();
    }

    /**
     * {@inheritdoc}
     */
    public function serialize($keys = [], $valueSeparator = '=', $fieldSeparator = ' ', $quote = '"')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'serialize');
        return $pluginInfo ? $this->___callPlugins('serialize', func_get_args(), $pluginInfo) : parent::serialize($keys, $valueSeparator, $fieldSeparator, $quote);
    }

    /**
     * {@inheritdoc}
     */
    public function debug($data = null, &$objects = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'debug');
        return $pluginInfo ? $this->___callPlugins('debug', func_get_args(), $pluginInfo) : parent::debug($data, $objects);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetSet($offset, $value)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'offsetSet');
        return $pluginInfo ? $this->___callPlugins('offsetSet', func_get_args(), $pluginInfo) : parent::offsetSet($offset, $value);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'offsetExists');
        return $pluginInfo ? $this->___callPlugins('offsetExists', func_get_args(), $pluginInfo) : parent::offsetExists($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetUnset($offset)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'offsetUnset');
        return $pluginInfo ? $this->___callPlugins('offsetUnset', func_get_args(), $pluginInfo) : parent::offsetUnset($offset);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'offsetGet');
        return $pluginInfo ? $this->___callPlugins('offsetGet', func_get_args(), $pluginInfo) : parent::offsetGet($offset);
    }
}
