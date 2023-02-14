<?php
namespace Magento\Tax\Model\Sales\Total\Quote\Shipping;

/**
 * Interceptor class for @see \Magento\Tax\Model\Sales\Total\Quote\Shipping
 */
class Interceptor extends \Magento\Tax\Model\Sales\Total\Quote\Shipping implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Tax\Model\Config $taxConfig, \Magento\Tax\Api\TaxCalculationInterface $taxCalculationService, \Magento\Tax\Api\Data\QuoteDetailsInterfaceFactory $quoteDetailsDataObjectFactory, \Magento\Tax\Api\Data\QuoteDetailsItemInterfaceFactory $quoteDetailsItemDataObjectFactory, \Magento\Tax\Api\Data\TaxClassKeyInterfaceFactory $taxClassKeyDataObjectFactory, \Magento\Customer\Api\Data\AddressInterfaceFactory $customerAddressFactory, \Magento\Customer\Api\Data\RegionInterfaceFactory $customerAddressRegionFactory, ?\Magento\Tax\Helper\Data $taxHelper = null, ?\Magento\Tax\Api\Data\QuoteDetailsItemExtensionInterfaceFactory $quoteDetailsItemExtensionInterfaceFactory = null)
    {
        $this->___init();
        parent::__construct($taxConfig, $taxCalculationService, $quoteDetailsDataObjectFactory, $quoteDetailsItemDataObjectFactory, $taxClassKeyDataObjectFactory, $customerAddressFactory, $customerAddressRegionFactory, $taxHelper, $quoteDetailsItemExtensionInterfaceFactory);
    }

    /**
     * {@inheritdoc}
     */
    public function collect(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment, \Magento\Quote\Model\Quote\Address\Total $total)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'collect');
        return $pluginInfo ? $this->___callPlugins('collect', func_get_args(), $pluginInfo) : parent::collect($quote, $shippingAssignment, $total);
    }

    /**
     * {@inheritdoc}
     */
    public function fetch(\Magento\Quote\Model\Quote $quote, \Magento\Quote\Model\Quote\Address\Total $total)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'fetch');
        return $pluginInfo ? $this->___callPlugins('fetch', func_get_args(), $pluginInfo) : parent::fetch($quote, $total);
    }

    /**
     * {@inheritdoc}
     */
    public function mapAddress(\Magento\Quote\Model\Quote\Address $address)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mapAddress');
        return $pluginInfo ? $this->___callPlugins('mapAddress', func_get_args(), $pluginInfo) : parent::mapAddress($address);
    }

    /**
     * {@inheritdoc}
     */
    public function mapItem(\Magento\Tax\Api\Data\QuoteDetailsItemInterfaceFactory $itemDataObjectFactory, \Magento\Quote\Model\Quote\Item\AbstractItem $item, $priceIncludesTax, $useBaseCurrency, $parentCode = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mapItem');
        return $pluginInfo ? $this->___callPlugins('mapItem', func_get_args(), $pluginInfo) : parent::mapItem($itemDataObjectFactory, $item, $priceIncludesTax, $useBaseCurrency, $parentCode);
    }

    /**
     * {@inheritdoc}
     */
    public function mapItemExtraTaxables(\Magento\Tax\Api\Data\QuoteDetailsItemInterfaceFactory $itemDataObjectFactory, \Magento\Quote\Model\Quote\Item\AbstractItem $item, $priceIncludesTax, $useBaseCurrency)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mapItemExtraTaxables');
        return $pluginInfo ? $this->___callPlugins('mapItemExtraTaxables', func_get_args(), $pluginInfo) : parent::mapItemExtraTaxables($itemDataObjectFactory, $item, $priceIncludesTax, $useBaseCurrency);
    }

    /**
     * {@inheritdoc}
     */
    public function mapItems(\Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment, $priceIncludesTax, $useBaseCurrency)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mapItems');
        return $pluginInfo ? $this->___callPlugins('mapItems', func_get_args(), $pluginInfo) : parent::mapItems($shippingAssignment, $priceIncludesTax, $useBaseCurrency);
    }

    /**
     * {@inheritdoc}
     */
    public function populateAddressData(\Magento\Tax\Api\Data\QuoteDetailsInterface $quoteDetails, \Magento\Quote\Model\Quote\Address $address)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'populateAddressData');
        return $pluginInfo ? $this->___callPlugins('populateAddressData', func_get_args(), $pluginInfo) : parent::populateAddressData($quoteDetails, $address);
    }

    /**
     * {@inheritdoc}
     */
    public function getShippingDataObject(\Magento\Quote\Api\Data\ShippingAssignmentInterface $shippingAssignment, \Magento\Quote\Model\Quote\Address\Total $total, $useBaseCurrency)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getShippingDataObject');
        return $pluginInfo ? $this->___callPlugins('getShippingDataObject', func_get_args(), $pluginInfo) : parent::getShippingDataObject($shippingAssignment, $total, $useBaseCurrency);
    }

    /**
     * {@inheritdoc}
     */
    public function updateItemTaxInfo($quoteItem, $itemTaxDetails, $baseItemTaxDetails, $store)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'updateItemTaxInfo');
        return $pluginInfo ? $this->___callPlugins('updateItemTaxInfo', func_get_args(), $pluginInfo) : parent::updateItemTaxInfo($quoteItem, $itemTaxDetails, $baseItemTaxDetails, $store);
    }

    /**
     * {@inheritdoc}
     */
    public function convertAppliedTaxes($appliedTaxes, $baseAppliedTaxes, $extraInfo = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'convertAppliedTaxes');
        return $pluginInfo ? $this->___callPlugins('convertAppliedTaxes', func_get_args(), $pluginInfo) : parent::convertAppliedTaxes($appliedTaxes, $baseAppliedTaxes, $extraInfo);
    }

    /**
     * {@inheritdoc}
     */
    public function setCode($code)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'setCode');
        return $pluginInfo ? $this->___callPlugins('setCode', func_get_args(), $pluginInfo) : parent::setCode($code);
    }

    /**
     * {@inheritdoc}
     */
    public function getCode()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCode');
        return $pluginInfo ? $this->___callPlugins('getCode', func_get_args(), $pluginInfo) : parent::getCode();
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
    public function _setTotal(\Magento\Quote\Model\Quote\Address\Total $total)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, '_setTotal');
        return $pluginInfo ? $this->___callPlugins('_setTotal', func_get_args(), $pluginInfo) : parent::_setTotal($total);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemRowTotal(\Magento\Quote\Model\Quote\Item\AbstractItem $item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemRowTotal');
        return $pluginInfo ? $this->___callPlugins('getItemRowTotal', func_get_args(), $pluginInfo) : parent::getItemRowTotal($item);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemBaseRowTotal(\Magento\Quote\Model\Quote\Item\AbstractItem $item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemBaseRowTotal');
        return $pluginInfo ? $this->___callPlugins('getItemBaseRowTotal', func_get_args(), $pluginInfo) : parent::getItemBaseRowTotal($item);
    }

    /**
     * {@inheritdoc}
     */
    public function getIsItemRowTotalCompoundable(\Magento\Quote\Model\Quote\Item\AbstractItem $item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getIsItemRowTotalCompoundable');
        return $pluginInfo ? $this->___callPlugins('getIsItemRowTotalCompoundable', func_get_args(), $pluginInfo) : parent::getIsItemRowTotalCompoundable($item);
    }

    /**
     * {@inheritdoc}
     */
    public function processConfigArray($config, $store)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'processConfigArray');
        return $pluginInfo ? $this->___callPlugins('processConfigArray', func_get_args(), $pluginInfo) : parent::processConfigArray($config, $store);
    }
}
