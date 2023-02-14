<?php
namespace Magento\Sales\Model\Order\InvoiceRepository;

/**
 * Interceptor class for @see \Magento\Sales\Model\Order\InvoiceRepository
 */
class Interceptor extends \Magento\Sales\Model\Order\InvoiceRepository implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Sales\Model\ResourceModel\Metadata $invoiceMetadata, \Magento\Sales\Api\Data\InvoiceSearchResultInterfaceFactory $searchResultFactory, ?\Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor = null)
    {
        $this->___init();
        parent::__construct($invoiceMetadata, $searchResultFactory, $collectionProcessor);
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
    public function create()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'create');
        return $pluginInfo ? $this->___callPlugins('create', func_get_args(), $pluginInfo) : parent::create();
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
    public function delete(\Magento\Sales\Api\Data\InvoiceInterface $entity)
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
    public function save(\Magento\Sales\Api\Data\InvoiceInterface $entity)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'save');
        return $pluginInfo ? $this->___callPlugins('save', func_get_args(), $pluginInfo) : parent::save($entity);
    }
}
