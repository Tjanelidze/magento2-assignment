<?php

namespace Assignment\Signup\Block;

class Form extends \Magento\Framework\View\Element\Template
{
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        array $data = []
    )
    {
        $this->scopeConfig = $scopeConfig;
        parent::__construct($context, $data);
    }

    /**
     * Get form action URL for POST form request
     *
     * @return string
     */
    public function getFormAction()
    {

        return '/signup/index/index';
    }
    public function getEnabled()
    {
        return $this->scopeConfig->getValue(
            'assignment_signup/general/enabled',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
