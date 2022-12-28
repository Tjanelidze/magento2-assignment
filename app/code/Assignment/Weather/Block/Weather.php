<?php

namespace Assignment\Weather\Block;

use Magento\Framework\View\Element\Template;

class Weather extends Template
{

    protected $_WeatherFactory;
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Assignment\Weather\Model\WeatherFactory $weatherFactory
    ) {
        $this->_weatherFactory = $weatherFactory;
        parent::__construct($context);
    }
    public function getFormAction()
    {
        return $this->getUrl('weather/index/save');
    }

    public function getWeatherCollection()
    {
        $weather = $this->_weatherFactory->create();
         $lastWeatherData =$weather->getCollection()->getLastItem()->getData();
        return $lastWeatherData;
    }
}
