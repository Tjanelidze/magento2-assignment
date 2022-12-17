<?php

namespace Assignment\Signup\Model\ResourceModel\Signup;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Assignment\Signup\Model\Signup;
use Assignment\Signup\Model\ResourceModel\Signup as SignupResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Signup::class, SignupResource::class);
    }
}
