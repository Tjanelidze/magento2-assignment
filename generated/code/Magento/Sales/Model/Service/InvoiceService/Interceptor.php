<?php
namespace Magento\Sales\Model\Service\InvoiceService;

/**
 * Interceptor class for @see \Magento\Sales\Model\Service\InvoiceService
 */
class Interceptor extends \Magento\Sales\Model\Service\InvoiceService implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Sales\Api\InvoiceRepositoryInterface $repository, \Magento\Sales\Api\InvoiceCommentRepositoryInterface $commentRepository, \Magento\Framework\Api\SearchCriteriaBuilder $criteriaBuilder, \Magento\Framework\Api\FilterBuilder $filterBuilder, \Magento\Sales\Model\Order\InvoiceNotifier $notifier, \Magento\Sales\Api\OrderRepositoryInterface $orderRepository, \Magento\Sales\Model\Convert\Order $orderConverter, \Magento\Framework\Serialize\Serializer\Json $serializer)
    {
        $this->___init();
        parent::__construct($repository, $commentRepository, $criteriaBuilder, $filterBuilder, $notifier, $orderRepository, $orderConverter, $serializer);
    }

    /**
     * {@inheritdoc}
     */
    public function setCapture($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCapture');
        return $pluginInfo ? $this->___callPlugins('setCapture', func_get_args(), $pluginInfo) : parent::setCapture($id);
    }

    /**
     * {@inheritdoc}
     */
    public function getCommentsList($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCommentsList');
        return $pluginInfo ? $this->___callPlugins('getCommentsList', func_get_args(), $pluginInfo) : parent::getCommentsList($id);
    }

    /**
     * {@inheritdoc}
     */
    public function notify($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'notify');
        return $pluginInfo ? $this->___callPlugins('notify', func_get_args(), $pluginInfo) : parent::notify($id);
    }

    /**
     * {@inheritdoc}
     */
    public function setVoid($id)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setVoid');
        return $pluginInfo ? $this->___callPlugins('setVoid', func_get_args(), $pluginInfo) : parent::setVoid($id);
    }

    /**
     * {@inheritdoc}
     */
    public function prepareInvoice(\Magento\Sales\Model\Order $order, array $orderItemsQtyToInvoice = []) : \Magento\Sales\Api\Data\InvoiceInterface
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'prepareInvoice');
        return $pluginInfo ? $this->___callPlugins('prepareInvoice', func_get_args(), $pluginInfo) : parent::prepareInvoice($order, $orderItemsQtyToInvoice);
    }
}
