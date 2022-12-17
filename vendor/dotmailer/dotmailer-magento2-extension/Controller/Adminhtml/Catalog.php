<?php

namespace Dotdigitalgroup\Email\Controller\Adminhtml;

abstract class Catalog extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Dotdigitalgroup_Email::catalog';
}
