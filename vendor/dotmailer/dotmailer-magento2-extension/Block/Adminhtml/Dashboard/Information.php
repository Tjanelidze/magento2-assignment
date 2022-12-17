<?php

namespace Dotdigitalgroup\Email\Block\Adminhtml\Dashboard;

use Dotdigitalgroup\Email\Model\Connector\Module;

/**
 * Dashboard information block
 *
 * @api
 */
class Information extends \Magento\Backend\Block\Template
{
    /**
     * Helper.
     *
     * @var \Dotdigitalgroup\Email\Helper\Data
     */
    private $helper;

    /**
     * Test class.
     * @var \Dotdigitalgroup\Email\Model\Apiconnector\Test
     */
    private $test;

    /**
     * @var \Magento\Framework\App\ProductMetadata
     */
    private $productMetadata;

    /*
     * @var \Dotdigitalgroup\Email\Model\ResourceModel\FailedAuth\Collection
     */
    private $failedAuthCollectionFactory;

    /**
     * @var Module
     */
    private $moduleList;

    /**
     * @var int
     */
    private $storeIdFromParam = 1;

    /**
     * Information constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Dotdigitalgroup\Email\Model\Apiconnector\Test $test
     * @param \Dotdigitalgroup\Email\Helper\Data $helper
     * @param \Magento\Framework\App\ProductMetadataFactory $productMetadata
     * @param Module $moduleList
     * @param \Dotdigitalgroup\Email\Model\ResourceModel\FailedAuth\CollectionFactory $failedAuthCollectionFactory
     * @param array $data
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Dotdigitalgroup\Email\Model\Apiconnector\Test $test,
        \Dotdigitalgroup\Email\Helper\Data $helper,
        \Magento\Framework\App\ProductMetadataFactory $productMetadata,
        Module $moduleList,
        \Dotdigitalgroup\Email\Model\ResourceModel\FailedAuth\CollectionFactory $failedAuthCollectionFactory,
        array $data = []
    ) {
        $this->productMetadata = $productMetadata->create();
        $this->test = $test;
        $this->helper = $helper;
        $this->failedAuthCollectionFactory = $failedAuthCollectionFactory;
        $this->moduleList = $moduleList;
        parent::__construct($context, $data);
        $this->getStoreIdParam();
    }

    /**
     * @return string
     */
    public function getPhpVersion()
    {
        return __('v. %1', PHP_VERSION);
    }

    /**
     * @return string
     */
    public function getPhpMaxExecutionTime()
    {
        return $this->escapeHtml(ini_get('max_execution_time') . ' sec.');
    }

    /**
     * @return string
     */
    public function getDeveloperMode()
    {
        return $this->escapeHtml($this->_appState->getMode());
    }

    /**
     * Magento version
     * @return \Magento\Framework\Phrase | string
     */
    public function getMagentoVersion()
    {
        $productMetadata = $this->productMetadata;

        return $this->escapeHtml(__('ver. %1', $productMetadata->getVersion()));
    }

    /**
     * @return string
     */
    public function getConnectorVersion()
    {
        return $this->escapeHtml(__('v. %1', $this->moduleList->getConnectorVersion()));
    }

    /**
     * @return bool
     */
    public function hasChatModule()
    {
        return $this->moduleList->hasChatModule();
    }

    /**
     * @return string
     */
    public function getChatConnectorVersion()
    {
        return $this->escapeHtml(__('v. %1', $this->moduleList->getChatConnectorVersion()));
    }

    /**
     * @return bool
     */
    public function hasEnterpriseModule()
    {
        return $this->moduleList->hasEnterpriseModule();
    }

    /**
     * @return string
     */
    public function getEnterpriseConnectorVersion()
    {
        return $this->escapeHtml(__('v. %1', $this->moduleList->getEnterpriseConnectorVersion()));
    }

    /**
     * @return bool
     */
    public function hasB2bModule()
    {
        return $this->moduleList->hasB2bModule();
    }

    /**
     * @return string
     */
    public function getB2bConnectorVersion()
    {
        return $this->escapeHtml(__('v. %1', $this->moduleList->getB2bConnectorVersion()));
    }

    /**
     * @return bool
     */
    public function hasSmsModule()
    {
        return $this->moduleList->hasSmsModule();
    }

    /**
     * @return string
     */
    public function getSmsConnectorVersion()
    {
        return $this->escapeHtml(__('v. %1', $this->moduleList->getSmsConnectorVersion()));
    }

    /**
     * Return HTML indicating the validity of stored API credentials.
     * @return string
     */
    public function getApiValid()
    {
        $apiUsername = $this->helper->getApiUsername();
        $apiPassword = $this->helper->getApiPassword();

        $result = $this->test->validate($apiUsername, $apiPassword);

        return ($result) ? '<span class="message message-success">Valid</span>' :
            '<span class="message message-error">Not Valid</span>';
    }

    /**
     * Get the last successful execution for import.
     *
     * @return string
     */
    public function getCronLastExecution()
    {
        $date = $this->escapeHtml($this->helper->getDateLastCronRun('ddg_automation_importer'));

        if (! $date) {
            $date = '<span class="message message-error">No cron found</span>';
        }
        return $date;
    }

    /**
     * Get the passcode used for DC.
     *
     * @return string
     */
    public function getDynamicContentPasscode()
    {
        return $this->helper->getPasscode();
    }

    /**
     * Abandoned cart limit.
     *
     * @return string
     */
    public function getAbandonedCartLimit()
    {
        return ($this->helper->getAbandonedCartLimit()) ? __('%1 hour', $this->helper->getAbandonedCartLimit()) :
            __('No limit');
    }

    /**
     * @return \Magento\Framework\Phrase|string]
     */
    public function getAuthStatus()
    {
        $collection = $this->failedAuthCollectionFactory->create()
            ->loadByStoreId($this->storeIdFromParam);
        $failedAuth = $collection->getFirstItem();

        //check if the failed auth is set for the store
        if ($failedAuth->getId()) {
            return ($failedAuth->isLocked()) ? __('Locked') : __('Not locked');
        } else {
            return __('Not locked');
        }
    }

    /**
     * @return string|\Magento\Framework\Phrase
     */
    public function getLastFailedAuth()
    {
        $collection = $this->failedAuthCollectionFactory->create()
            ->loadByStoreId($this->storeIdFromParam);
        $failedAuth = $collection->getFirstItem();

        if ($failedAuth->getId()) {
            return $this->formatTime($failedAuth->getLastAttemptDate(), \IntlDateFormatter::LONG);
        } else {
            return __('None found');
        }
    }

    /**
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    private function getStoreIdParam()
    {
        $storeCode = $this->getRequest()->getParam('store');
        $websiteCode = $this->getRequest()->getParam('website');
        //store level
        if ($storeCode) {
            $this->storeIdFromParam = $this->_storeManager->getStore($storeCode)->getId();
        } else {
            //website level
            $this->storeIdFromParam = $this->_storeManager->getWebsite($websiteCode)->getDefaultStore()->getId();
        }
    }
}
