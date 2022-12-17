<?php
namespace Magento\MessageQueue\Console\ConsumerListCommand;

/**
 * Proxy class for @see \Magento\MessageQueue\Console\ConsumerListCommand
 */
class Proxy extends \Magento\MessageQueue\Console\ConsumerListCommand implements \Magento\Framework\ObjectManager\NoninterceptableInterface
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Proxied instance name
     *
     * @var string
     */
    protected $_instanceName = null;

    /**
     * Proxied instance
     *
     * @var \Magento\MessageQueue\Console\ConsumerListCommand
     */
    protected $_subject = null;

    /**
     * Instance shareability flag
     *
     * @var bool
     */
    protected $_isShared = null;

    /**
     * Proxy constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $instanceName
     * @param bool $shared
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\Magento\\MessageQueue\\Console\\ConsumerListCommand', $shared = true)
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
        $this->_isShared = $shared;
    }

    /**
     * @return array
     */
    public function __sleep()
    {
        return ['_subject', '_isShared', '_instanceName'];
    }

    /**
     * Retrieve ObjectManager from global scope
     */
    public function __wakeup()
    {
        $this->_objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    }

    /**
     * Clone proxied instance
     */
    public function __clone()
    {
        $this->_subject = clone $this->_getSubject();
    }

    /**
     * Get proxied instance
     *
     * @return \Magento\MessageQueue\Console\ConsumerListCommand
     */
    protected function _getSubject()
    {
        if (!$this->_subject) {
            $this->_subject = true === $this->_isShared
                ? $this->_objectManager->get($this->_instanceName)
                : $this->_objectManager->create($this->_instanceName);
        }
        return $this->_subject;
    }

    /**
     * {@inheritdoc}
     */
    public function ignoreValidationErrors()
    {
        return $this->_getSubject()->ignoreValidationErrors();
    }

    /**
     * {@inheritdoc}
     */
    public function setApplication(?\Symfony\Component\Console\Application $application = null)
    {
        return $this->_getSubject()->setApplication($application);
    }

    /**
     * {@inheritdoc}
     */
    public function setHelperSet(\Symfony\Component\Console\Helper\HelperSet $helperSet)
    {
        return $this->_getSubject()->setHelperSet($helperSet);
    }

    /**
     * {@inheritdoc}
     */
    public function getHelperSet()
    {
        return $this->_getSubject()->getHelperSet();
    }

    /**
     * {@inheritdoc}
     */
    public function getApplication()
    {
        return $this->_getSubject()->getApplication();
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->_getSubject()->isEnabled();
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        return $this->_getSubject()->run($input, $output);
    }

    /**
     * {@inheritdoc}
     */
    public function setCode(callable $code)
    {
        return $this->_getSubject()->setCode($code);
    }

    /**
     * {@inheritdoc}
     */
    public function mergeApplicationDefinition($mergeArgs = true)
    {
        return $this->_getSubject()->mergeApplicationDefinition($mergeArgs);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefinition($definition)
    {
        return $this->_getSubject()->setDefinition($definition);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefinition()
    {
        return $this->_getSubject()->getDefinition();
    }

    /**
     * {@inheritdoc}
     */
    public function getNativeDefinition()
    {
        return $this->_getSubject()->getNativeDefinition();
    }

    /**
     * {@inheritdoc}
     */
    public function addArgument($name, $mode = null, $description = '', $default = null)
    {
        return $this->_getSubject()->addArgument($name, $mode, $description, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function addOption($name, $shortcut = null, $mode = null, $description = '', $default = null)
    {
        return $this->_getSubject()->addOption($name, $shortcut, $mode, $description, $default);
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        return $this->_getSubject()->setName($name);
    }

    /**
     * {@inheritdoc}
     */
    public function setProcessTitle($title)
    {
        return $this->_getSubject()->setProcessTitle($title);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->_getSubject()->getName();
    }

    /**
     * {@inheritdoc}
     */
    public function setHidden($hidden)
    {
        return $this->_getSubject()->setHidden($hidden);
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return $this->_getSubject()->isHidden();
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        return $this->_getSubject()->setDescription($description);
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->_getSubject()->getDescription();
    }

    /**
     * {@inheritdoc}
     */
    public function setHelp($help)
    {
        return $this->_getSubject()->setHelp($help);
    }

    /**
     * {@inheritdoc}
     */
    public function getHelp()
    {
        return $this->_getSubject()->getHelp();
    }

    /**
     * {@inheritdoc}
     */
    public function getProcessedHelp()
    {
        return $this->_getSubject()->getProcessedHelp();
    }

    /**
     * {@inheritdoc}
     */
    public function setAliases($aliases)
    {
        return $this->_getSubject()->setAliases($aliases);
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases()
    {
        return $this->_getSubject()->getAliases();
    }

    /**
     * {@inheritdoc}
     */
    public function getSynopsis($short = false)
    {
        return $this->_getSubject()->getSynopsis($short);
    }

    /**
     * {@inheritdoc}
     */
    public function addUsage($usage)
    {
        return $this->_getSubject()->addUsage($usage);
    }

    /**
     * {@inheritdoc}
     */
    public function getUsages()
    {
        return $this->_getSubject()->getUsages();
    }

    /**
     * {@inheritdoc}
     */
    public function getHelper($name)
    {
        return $this->_getSubject()->getHelper($name);
    }
}
