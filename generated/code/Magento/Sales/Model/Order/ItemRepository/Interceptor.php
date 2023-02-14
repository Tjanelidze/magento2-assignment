<?php
namespace Magento\Sales\Model\Order\ItemRepository;

/**
 * Interceptor class for @see \Magento\Sales\Model\Order\ItemRepository
 */
class Interceptor extends \Magento\Sales\Model\Order\ItemRepository implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\DataObject\Factory $objectFactory, \Magento\Sales\Model\ResourceModel\Metadata $metadata, \Magento\Sales\Api\Data\OrderItemSearchResultInterfaceFactory $searchResultFactory, \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor, \Magento\Sales\Model\Order\ProductOption $productOption, array $processorPool = [])
    {
        $this->___init();
        parent::__construct($objectFactory, $metadata, $searchResultFactory, $collectionProcessor, $productOption, $processorPool);
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'get');
        return $pluginInfo ? $this->___callPlugins('get', func_get_args(), $pluginInfo) : parent::get($id);
    }

    /**
     * {@inheritdoc}
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getList');
        return $pluginInfo ? $this->___callPlugins('getList', func_get_args(), $pluginInfo) : parent::getList($searchCriteria);
    }

    /**
     * {@inheritdoc}
     */
    public function delete(\Magento\Sales\Api\Data\OrderItemInterface $entity)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'delete');
        return $pluginInfo ? $this->___callPlugins('delete', func_get_args(), $pluginInfo) : parent::delete($entity);
    }

    /**
     * {@inheritdoc}
     */
    public function deleteById($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'deleteById');
        return $pluginInfo ? $this->___callPlugins('deleteById', func_get_args(), $pluginInfo) : parent::deleteById($id);
    }

    /**
     * {@inheritdoc}
     */
    public function save(\Magento\Sales\Api\Data\OrderItemInterface $entity)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'save');
        return $pluginInfo ? $this->___callPlugins('save', func_get_args(), $pluginInfo) : parent::save($entity);
    }
}
