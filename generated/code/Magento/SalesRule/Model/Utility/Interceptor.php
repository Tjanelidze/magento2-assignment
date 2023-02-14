<?php
namespace Magento\SalesRule\Model\Utility;

/**
 * Interceptor class for @see \Magento\SalesRule\Model\Utility
 */
class Interceptor extends \Magento\SalesRule\Model\Utility implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\SalesRule\Model\ResourceModel\Coupon\UsageFactory $usageFactory, \Magento\SalesRule\Model\CouponFactory $couponFactory, \Magento\SalesRule\Model\Rule\CustomerFactory $customerFactory, \Magento\Framework\DataObjectFactory $objectFactory, \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency)
    {
        $this->___init();
        parent::__construct($usageFactory, $couponFactory, $customerFactory, $objectFactory, $priceCurrency);
    }

    /**
     * {@inheritdoc}
     */
    public function canProcessRule($rule, $address)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'canProcessRule');
        return $pluginInfo ? $this->___callPlugins('canProcessRule', func_get_args(), $pluginInfo) : parent::canProcessRule($rule, $address);
    }

    /**
     * {@inheritdoc}
     */
    public function minFix(\Magento\SalesRule\Model\Rule\Action\Discount\Data $discountData, \Magento\Quote\Model\Quote\Item\AbstractItem $item, $qty)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'minFix');
        return $pluginInfo ? $this->___callPlugins('minFix', func_get_args(), $pluginInfo) : parent::minFix($discountData, $item, $qty);
    }

    /**
     * {@inheritdoc}
     */
    public function deltaRoundingFix(\Magento\SalesRule\Model\Rule\Action\Discount\Data $discountData, \Magento\Quote\Model\Quote\Item\AbstractItem $item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'deltaRoundingFix');
        return $pluginInfo ? $this->___callPlugins('deltaRoundingFix', func_get_args(), $pluginInfo) : parent::deltaRoundingFix($discountData, $item);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemPrice($item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemPrice');
        return $pluginInfo ? $this->___callPlugins('getItemPrice', func_get_args(), $pluginInfo) : parent::getItemPrice($item);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemBasePrice($item)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemBasePrice');
        return $pluginInfo ? $this->___callPlugins('getItemBasePrice', func_get_args(), $pluginInfo) : parent::getItemBasePrice($item);
    }

    /**
     * {@inheritdoc}
     */
    public function getItemQty($item, $rule)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getItemQty');
        return $pluginInfo ? $this->___callPlugins('getItemQty', func_get_args(), $pluginInfo) : parent::getItemQty($item, $rule);
    }

    /**
     * {@inheritdoc}
     */
    public function mergeIds($a1, $a2, $asString = true)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'mergeIds');
        return $pluginInfo ? $this->___callPlugins('mergeIds', func_get_args(), $pluginInfo) : parent::mergeIds($a1, $a2, $asString);
    }

    /**
     * {@inheritdoc}
     */
    public function resetRoundingDeltas()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'resetRoundingDeltas');
        return $pluginInfo ? $this->___callPlugins('resetRoundingDeltas', func_get_args(), $pluginInfo) : parent::resetRoundingDeltas();
    }
}
