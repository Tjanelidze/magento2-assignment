<?php

namespace Assignment\Weather\Model\ResourceModel\Weather;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Assignment\Weather\Model\Weather;
use Assignment\Weather\Model\ResourceModel\Weather as WeatherResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Weather::class, WeatherResource::class);
    }

    protected function _initSelect()
    {
        parent::_initSelect();
        $this->getSelect()->columns(
            $this->_map
        );
        return $this;
    }

    protected $_map = ['id', 'city', 'country', 'temperature'];
}
