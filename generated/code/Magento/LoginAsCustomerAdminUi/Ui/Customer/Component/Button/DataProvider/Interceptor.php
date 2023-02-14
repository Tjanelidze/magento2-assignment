<?php
namespace Magento\LoginAsCustomerAdminUi\Ui\Customer\Component\Button\DataProvider;

/**
 * Interceptor class for @see \Magento\LoginAsCustomerAdminUi\Ui\Customer\Component\Button\DataProvider
 */
class Interceptor extends \Magento\LoginAsCustomerAdminUi\Ui\Customer\Component\Button\DataProvider implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Escaper $escaper, \Magento\Framework\UrlInterface $urlBuilder, array $data = [])
    {
        $this->___init();
        parent::__construct($escaper, $urlBuilder, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getData(int $customerId) : array
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getData');
        return $pluginInfo ? $this->___callPlugins('getData', func_get_args(), $pluginInfo) : parent::getData($customerId);
    }
}
