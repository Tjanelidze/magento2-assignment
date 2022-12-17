<?php

namespace Dotdigitalgroup\Chat\Controller\Profile;

use Dotdigitalgroup\Chat\Model\Profile\UpdateChatProfile;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\Action\Action;

class Index extends Action
{
    /**
     * @var UpdateChatProfile
     */
    private $chatProfile;

    /**
     * Profile constructor
     *
     * @param Context $context
     * @param $chatProfile
     */
    public function __construct(
        Context $context,
        UpdateChatProfile $chatProfile
    ) {
        $this->chatProfile = $chatProfile;
        parent::__construct($context);
    }

    /**
     * Update the user's profile with Chat
     *
     * @return ResponseInterface
     */
    public function execute()
    {
        $this->chatProfile->update($this->getRequest()->getParam('profileId'));

        return $this->getResponse()
            ->setHttpResponseCode(204)
            ->sendHeaders();
    }
}
