<?php

namespace Dotdigitalgroup\Email\Block\Adminhtml\Config\Dynamic;

trait OrderRecommendation
{
    /**
     * @var \Dotdigitalgroup\Email\Helper\Data
     */
    public $dataHelper;

    /**
     * Upsell constructor.
     *
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Dotdigitalgroup\Email\Helper\Data $dataHelper
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Dotdigitalgroup\Email\Helper\Data $dataHelper
    ) {
        $this->dataHelper = $dataHelper;

        parent::__construct($context);
    }

    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     *
     * @return string
     */
    public function _getElementHtml(
        \Magento\Framework\Data\Form\Element\AbstractElement $element
    ) {
        //passcode to append for url
        $passcode = $this->dataHelper->getPasscode();
        //last order id witch information will be generated
        $lastOrderid = $this->dataHelper->getLastOrderId();

        if (empty($passcode)) {
            $passcode = '[PLEASE SET UP A PASSCODE]';
        }
        if (!$lastOrderid) {
            $lastOrderid = '[PLEASE MAP THE LAST ORDER ID]';
        }

        //generate the base url and display for default store id
        $baseUrl = $this->dataHelper->generateDynamicUrl();

        $text = sprintf(
            '%sconnector/product/%s/code/%s/order_id/@%s@',
            $baseUrl,
            self::URL_SLUG,
            $passcode,
            $lastOrderid
        );
        $element->setData('value', $text);

        return parent::_getElementHtml($element);
    }
}
