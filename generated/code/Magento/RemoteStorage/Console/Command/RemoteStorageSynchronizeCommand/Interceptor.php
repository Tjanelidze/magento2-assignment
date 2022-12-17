<?php
namespace Magento\RemoteStorage\Console\Command\RemoteStorageSynchronizeCommand;

/**
 * Interceptor class for @see \Magento\RemoteStorage\Console\Command\RemoteStorageSynchronizeCommand
 */
class Interceptor extends \Magento\RemoteStorage\Console\Command\RemoteStorageSynchronizeCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\RemoteStorage\Model\Synchronizer $synchronizer, \Magento\RemoteStorage\Model\Config $config)
    {
        $this->___init();
        parent::__construct($synchronizer, $config);
    }

    /**
     * {@inheritdoc}
     */
    public function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output) : int
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute($input, $output);
    }

    /**
     * {@inheritdoc}
     */
    public function ignoreValidationErrors()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'ignoreValidationErrors');
        return $pluginInfo ? $this->___callPlugins('ignoreValidationErrors', func_get_args(), $pluginInfo) : parent::ignoreValidationErrors();
    }

    /**
     * {@inheritdoc}
     */
    public function setApplication(?\Symfony\Component\Console\Application $application = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setApplication');
        return $pluginInfo ? $this->___callPlugins('setApplication', func_get_args(), $pluginInfo) : parent::setApplication($application);
    }

    /**
     * {@inheritdoc}
     */
    public function setHelperSet(\Symfony\Component\Console\Helper\HelperSet $helperSet)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHelperSet');
        return $pluginInfo ? $this->___callPlugins('setHelperSet', func_get_args(), $pluginInfo) : parent::setHelperSet($helperSet);
    }

    /**
     * {@inheritdoc}
     */
    public function getHelperSet()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHelperSet');
        return $pluginInfo ? $this->___callPlugins('getHelperSet', func_get_args(), $pluginInfo) : parent::getHelperSet();
    }

    /**
     * {@inheritdoc}
     */
    public function getApplication()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getApplication');
        return $pluginInfo ? $this->___callPlugins('getApplication', func_get_args(), $pluginInfo) : parent::getApplication();
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isEnabled');
        return $pluginInfo ? $this->___callPlugins('isEnabled', func_get_args(), $pluginInfo) : parent::isEnabled();
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        return $pluginInfo ? $this->___callPlugins('run', func_get_args(), $pluginInfo) : parent::run($input, $output);
    }

    /**
     * {@inheritdoc}
     */
    public function setCode(callable $code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCode');
        return $pluginInfo ? $this->___callPlugins('setCode', func_get_args(), $pluginInfo) : parent::setCode($code);
    }

    /**
     * {@inheritdoc}
     */
    public function mergeApplicationDefinition($mergeArgs = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mergeApplicationDefinition');
        return $pluginInfo ? $this->___callPlugins('mergeApplicationDefinition', func_get_args(), $pluginInfo) : parent::mergeApplicationDefinition($mergeArgs);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefinition($definition)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDefinition');
        return $pluginInfo ? $this->___callPlugins('setDefinition', func_get_args(), $pluginInfo) : parent::setDefinition($definition);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefinition()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDefinition');
        return $pluginInfo ? $this->___callPlugins('getDefinition', func_get_args(), $pluginInfo) : parent::getDefinition();
    }

    /**
     * {@inheritdoc}
     */
    public function getNativeDefinition()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getNativeDefinition');
        return $pluginInfo ? $this->___callPlugins('getNativeDefinition', func_get_args(), $pluginInfo) : parent::getNativeDefinition();
    }

    /**
     * {@inheritdoc}
     */
    public function addArgument($name, $mode = null, $description = '', $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addArgument');
        return $pluginInfo ? $this->___callPlugins('addArgument', func_get_args(), $pluginInfo) : parent::addArgument($name, $mode, $description, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function addOption($name, $shortcut = null, $mode = null, $description = '', $default = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addOption');
        return $pluginInfo ? $this->___callPlugins('addOption', func_get_args(), $pluginInfo) : parent::addOption($name, $shortcut, $mode, $description, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setName');
        return $pluginInfo ? $this->___callPlugins('setName', func_get_args(), $pluginInfo) : parent::setName($name);
    }

    /**
     * {@inheritdoc}
     */
    public function setProcessTitle($title)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setProcessTitle');
        return $pluginInfo ? $this->___callPlugins('setProcessTitle', func_get_args(), $pluginInfo) : parent::setProcessTitle($title);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getName');
        return $pluginInfo ? $this->___callPlugins('getName', func_get_args(), $pluginInfo) : parent::getName();
    }

    /**
     * {@inheritdoc}
     */
    public function setHidden($hidden)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHidden');
        return $pluginInfo ? $this->___callPlugins('setHidden', func_get_args(), $pluginInfo) : parent::setHidden($hidden);
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'isHidden');
        return $pluginInfo ? $this->___callPlugins('isHidden', func_get_args(), $pluginInfo) : parent::isHidden();
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setDescription');
        return $pluginInfo ? $this->___callPlugins('setDescription', func_get_args(), $pluginInfo) : parent::setDescription($description);
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDescription');
        return $pluginInfo ? $this->___callPlugins('getDescription', func_get_args(), $pluginInfo) : parent::getDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function setHelp($help)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setHelp');
        return $pluginInfo ? $this->___callPlugins('setHelp', func_get_args(), $pluginInfo) : parent::setHelp($help);
    }

    /**
     * {@inheritdoc}
     */
    public function getHelp()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHelp');
        return $pluginInfo ? $this->___callPlugins('getHelp', func_get_args(), $pluginInfo) : parent::getHelp();
    }

    /**
     * {@inheritdoc}
     */
    public function getProcessedHelp()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getProcessedHelp');
        return $pluginInfo ? $this->___callPlugins('getProcessedHelp', func_get_args(), $pluginInfo) : parent::getProcessedHelp();
    }

    /**
     * {@inheritdoc}
     */
    public function setAliases($aliases)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setAliases');
        return $pluginInfo ? $this->___callPlugins('setAliases', func_get_args(), $pluginInfo) : parent::setAliases($aliases);
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAliases');
        return $pluginInfo ? $this->___callPlugins('getAliases', func_get_args(), $pluginInfo) : parent::getAliases();
    }

    /**
     * {@inheritdoc}
     */
    public function getSynopsis($short = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getSynopsis');
        return $pluginInfo ? $this->___callPlugins('getSynopsis', func_get_args(), $pluginInfo) : parent::getSynopsis($short);
    }

    /**
     * {@inheritdoc}
     */
    public function addUsage($usage)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addUsage');
        return $pluginInfo ? $this->___callPlugins('addUsage', func_get_args(), $pluginInfo) : parent::addUsage($usage);
    }

    /**
     * {@inheritdoc}
     */
    public function getUsages()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUsages');
        return $pluginInfo ? $this->___callPlugins('getUsages', func_get_args(), $pluginInfo) : parent::getUsages();
    }

    /**
     * {@inheritdoc}
     */
    public function getHelper($name)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getHelper');
        return $pluginInfo ? $this->___callPlugins('getHelper', func_get_args(), $pluginInfo) : parent::getHelper($name);
    }
}
