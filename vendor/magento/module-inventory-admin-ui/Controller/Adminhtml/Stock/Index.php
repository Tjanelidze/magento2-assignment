<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magento\InventoryAdminUi\Controller\Adminhtml\Stock;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\App\Action\HttpGetActionInterface;

/**
 * Index Controller
 */
class Index extends Action implements HttpGetActionInterface
{
    /**
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'Magento_InventoryApi::stock';

    /**
     * @inheritdoc
     */
    public function execute(): ResultInterface
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $resultPage->setActiveMenu('Magento_InventoryAdminUi::stock')
            ->addBreadcrumb(__('Sources'), __('List'));
        $resultPage->getConfig()->getTitle()->prepend(__('Manage Stock'));

        return $resultPage;
    }
}
