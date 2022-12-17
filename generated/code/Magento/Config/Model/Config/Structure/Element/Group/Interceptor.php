<?php
namespace Magento\Config\Model\Config\Structure\Element\Group;

/**
 * Interceptor class for @see \Magento\Config\Model\Config\Structure\Element\Group
 */
class Interceptor extends \Magento\Config\Model\Config\Structure\Element\Group implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\Module\Manager $moduleManager, \Magento\Config\Model\Config\Structure\Element\Iterator\Field $childrenIterator, \Magento\Config\Model\Config\BackendClone\Factory $cloneModelFactory, \Magento\Config\Model\Config\Structure\Element\Dependency\Mapper $dependencyMapper)
    {
        $this->___init();
        parent::__construct($storeManager, $moduleManager, $childrenIterator, $cloneModelFactory, $dependencyMapper);
    }

    /**
     * {@inheritdoc}
     */
    public function shouldCloneFields()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'shouldCloneFields');
        return $pluginInfo ? $this->___callPlugins('shouldCloneFields', func_get_args(), $pluginInfo) : parent::shouldCloneFields();
    }

    /**
     * {@inheritdoc}
     */
    public function getCloneModel()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCloneModel');
        return $pluginInfo ? $this->___callPlugins('getCloneModel', func_get_args(), $pluginInfo) : parent::getCloneModel();
    }

    /**
     * {@inheritdoc}
     */
    public function populateFieldset(\Magento\Framework\Data\Form\Element\Fieldset $fieldset)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'populateFieldset');
        return $pluginInfo ? $this->___callPlugins('populateFieldset', func_get_args(), $pluginInfo) : parent::populateFieldset($fieldset);
    }

    /**
     * {@inheritdoc}
     */
    public function isExpanded()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isExpanded');
        return $pluginInfo ? $this->___callPlugins('isExpanded', func_get_args(), $pluginInfo) : parent::isExpanded();
    }

    /**
     * {@inheritdoc}
     */
    public function getFieldsetCss()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getFieldsetCss');
        return $pluginInfo ? $this->___callPlugins('getFieldsetCss', func_get_args(), $pluginInfo) : parent::getFieldsetCss();
    }

    /**
     * {@inheritdoc}
     */
    public function getDependencies($storeCode)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDependencies');
        return $pluginInfo ? $this->___callPlugins('getDependencies', func_get_args(), $pluginInfo) : parent::getDependencies($storeCode);
    }

    /**
     * {@inheritdoc}
     */
    public function setData(array $data, $scope)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setData');
        return $pluginInfo ? $this->___callPlugins('setData', func_get_args(), $pluginInfo) : parent::setData($data, $scope);
    }

    /**
     * {@inheritdoc}
     */
    public function hasChildren()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'hasChildren');
        return $pluginInfo ? $this->___callPlugins('hasChildren', func_get_args(), $pluginInfo) : parent::hasChildren();
    }

    /**
     * {@inheritdoc}
     */
    public function getChildren()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getChildren');
        return $pluginInfo ? $this->___callPlugins('getChildren', func_get_args(), $pluginInfo) : parent::getChildren();
    }

    /**
     * {@inheritdoc}
     */
    public function isVisible()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isVisible');
        return $pluginInfo ? $this->___callPlugins('isVisible', func_get_args(), $pluginInfo) : parent::isVisible();
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getData');
        return $pluginInfo ? $this->___callPlugins('getData', func_get_args(), $pluginInfo) : parent::getData();
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
    public function getLabel()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getLabel');
        return $pluginInfo ? $this->___callPlugins('getLabel', func_get_args(), $pluginInfo) : parent::getLabel();
    }

    /**
     * {@inheritdoc}
     */
    public function getComment()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getComment');
        return $pluginInfo ? $this->___callPlugins('getComment', func_get_args(), $pluginInfo) : parent::getComment();
    }

    /**
     * {@inheritdoc}
     */
    public function getFrontendModel()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getFrontendModel');
        return $pluginInfo ? $this->___callPlugins('getFrontendModel', func_get_args(), $pluginInfo) : parent::getFrontendModel();
    }

    /**
     * {@inheritdoc}
     */
    public function getAttribute($key)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAttribute');
        return $pluginInfo ? $this->___callPlugins('getAttribute', func_get_args(), $pluginInfo) : parent::getAttribute($key);
    }

    /**
     * {@inheritdoc}
     */
    public function getClass()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getClass');
        return $pluginInfo ? $this->___callPlugins('getClass', func_get_args(), $pluginInfo) : parent::getClass();
    }

    /**
     * {@inheritdoc}
     */
    public function getPath($fieldPrefix = '')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getPath');
        return $pluginInfo ? $this->___callPlugins('getPath', func_get_args(), $pluginInfo) : parent::getPath($fieldPrefix);
    }

    /**
     * {@inheritdoc}
     */
    public function getElementVisibility()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getElementVisibility');
        return $pluginInfo ? $this->___callPlugins('getElementVisibility', func_get_args(), $pluginInfo) : parent::getElementVisibility();
    }
}
