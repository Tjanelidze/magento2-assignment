<?php
namespace Magento\Directory\Model\AllowedCountries;

/**
 * Interceptor class for @see \Magento\Directory\Model\AllowedCountries
 */
class Interceptor extends \Magento\Directory\Model\AllowedCountries implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Store\Model\StoreManagerInterface $storeManager)
    {
        $this->___init();
        parent::__construct($scopeConfig, $storeManager);
    }

    /**
     * {@inheritdoc}
     */
    public function getAllowedCountries($scope = 'website', $scopeCode = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getAllowedCountries');
        return $pluginInfo ? $this->___callPlugins('getAllowedCountries', func_get_args(), $pluginInfo) : parent::getAllowedCountries($scope, $scopeCode);
    }

    /**
     * {@inheritdoc}
     */
    public function makeCountriesUnique(array $allowedCountries)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'makeCountriesUnique');
        return $pluginInfo ? $this->___callPlugins('makeCountriesUnique', func_get_args(), $pluginInfo) : parent::makeCountriesUnique($allowedCountries);
    }

    /**
     * {@inheritdoc}
     */
    public function getCountriesFromConfig($scope, $scopeCode)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getCountriesFromConfig');
        return $pluginInfo ? $this->___callPlugins('getCountriesFromConfig', func_get_args(), $pluginInfo) : parent::getCountriesFromConfig($scope, $scopeCode);
    }
}
