<?php
namespace Magento\Tax\Model\TaxCalculation;

/**
 * Interceptor class for @see \Magento\Tax\Model\TaxCalculation
 */
class Interceptor extends \Magento\Tax\Model\TaxCalculation implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Tax\Model\Calculation $calculation, \Magento\Tax\Model\Calculation\CalculatorFactory $calculatorFactory, \Magento\Tax\Model\Config $config, \Magento\Tax\Api\Data\TaxDetailsInterfaceFactory $taxDetailsDataObjectFactory, \Magento\Tax\Api\Data\TaxDetailsItemInterfaceFactory $taxDetailsItemDataObjectFactory, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Tax\Api\TaxClassManagementInterface $taxClassManagement, \Magento\Framework\Api\DataObjectHelper $dataObjectHelper)
    {
        $this->___init();
        parent::__construct($calculation, $calculatorFactory, $config, $taxDetailsDataObjectFactory, $taxDetailsItemDataObjectFactory, $storeManager, $taxClassManagement, $dataObjectHelper);
    }

    /**
     * {@inheritdoc}
     */
    public function calculateTax(\Magento\Tax\Api\Data\QuoteDetailsInterface $quoteDetails, $storeId = null, $round = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'calculateTax');
        return $pluginInfo ? $this->___callPlugins('calculateTax', func_get_args(), $pluginInfo) : parent::calculateTax($quoteDetails, $storeId, $round);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultCalculatedRate($productTaxClassID, $customerId = null, $storeId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getDefaultCalculatedRate');
        return $pluginInfo ? $this->___callPlugins('getDefaultCalculatedRate', func_get_args(), $pluginInfo) : parent::getDefaultCalculatedRate($productTaxClassID, $customerId, $storeId);
    }

    /**
     * {@inheritdoc}
     */
    public function getCalculatedRate($productTaxClassID, $customerId = null, $storeId = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCalculatedRate');
        return $pluginInfo ? $this->___callPlugins('getCalculatedRate', func_get_args(), $pluginInfo) : parent::getCalculatedRate($productTaxClassID, $customerId, $storeId);
    }
}
