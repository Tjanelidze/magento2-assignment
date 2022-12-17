<?php
namespace Magento\Config\Model\Config\Structure\ElementVisibility;

/**
 * Factory class for @see \Magento\Config\Model\Config\Structure\ElementVisibility\ConcealInProduction
 */
class ConcealInProductionFactory
{
    /**
     * Object Manager instance
     *
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager = null;

    /**
     * Instance name to create
     *
     * @var string
     */
    protected $_instanceName = null;

    /**
     * Factory constructor
     *
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param string $instanceName
     */
    public function __construct(\Magento\Framework\ObjectManagerInterface $objectManager, $instanceName = '\\Magento\\Config\\Model\\Config\\Structure\\ElementVisibility\\ConcealInProduction')
    {
        $this->_objectManager = $objectManager;
        $this->_instanceName = $instanceName;
    }

    /**
     * Create class instance with specified parameters
     *
     * @param array $data
     * @return \Magento\Config\Model\Config\Structure\ElementVisibility\ConcealInProduction
     */
    public function create(array $data = [])
    {
        return $this->_objectManager->create($this->_instanceName, $data);
    }
}
