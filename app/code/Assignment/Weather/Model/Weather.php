<?php

namespace Assignment\Weather\Model;

use Magento\Framework\Model\AbstractModel;

class Weather extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Assignment\Weather\Model\ResourceModel\Weather::class);
    }
}
