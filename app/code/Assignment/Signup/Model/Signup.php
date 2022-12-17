<?php

namespace Assignment\Signup\Model;

use Magento\Framework\Model\AbstractModel;

class Signup extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Assignment\Signup\Model\ResourceModel\Signup::class);
    }
}
