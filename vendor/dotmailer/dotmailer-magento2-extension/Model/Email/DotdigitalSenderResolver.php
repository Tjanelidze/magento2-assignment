<?php

namespace Dotdigitalgroup\Email\Model\Email;

use Dotdigitalgroup\Email\Helper\Transactional;
use Magento\Email\Model\Template\SenderResolver;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Registry;

/**
 * Class SenderResolver
 *
 * Set the message from name and email in transactional sends, using data set in email_template.
 */
class DotdigitalSenderResolver extends SenderResolver
{
    /**
     * @var Registry
     */
    private $registry;

    /**
     * @var TemplateFactory
     */
    private $templateFactory;

    /**
     * @var Transactional
     */
    private $transactionalHelper;

    /**
     * @var TemplateService
     */
    private $templateService;

    /**
     * SenderResolver constructor.
     *
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param \Magento\Framework\Registry $registry
     * @param TemplateFactory $templateFactory
     * @param Transactional $transactionalHelper
     * @param TemplateService $templateService
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        Registry $registry,
        TemplateFactory $templateFactory,
        Transactional $transactionalHelper,
        TemplateService $templateService
    ) {
        $this->registry = $registry;
        $this->templateFactory = $templateFactory;
        $this->transactionalHelper = $transactionalHelper;
        $this->templateService = $templateService;
        parent::__construct(
            $scopeConfig
        );
    }

    /**
     *
     * @param string|array $sender
     * @param int|null $scopeId
     *
     * @return array
     * @throws \Magento\Framework\Exception\MailException
     */
    public function resolve($sender, $scopeId = null)
    {
        $templateId = $this->templateService->getTemplateId();

        if ($templateId && $this->shouldIntercept()) {
            $template = $this->templateFactory->create()
                ->loadTemplate($templateId);
            if ($this->isDotmailerTemplateCode($template->getTemplateCode())) {
                return [
                    'email' => $template->getTemplateSenderEmail(),
                    'name' => $template->getTemplateSenderName()
                ];
            }
        }

        return parent::resolve($sender, $scopeId);
    }

    /**
     *
     * @return bool
     */
    private function shouldIntercept()
    {
        $storeId = $this->registry->registry('transportBuilderPluginStoreId');
        return $this->transactionalHelper->isEnabled($storeId);
    }

    /**
     *
     * @param string $templateCode
     *
     * @return bool
     */
    private function isDotmailerTemplateCode($templateCode)
    {
        return $this->transactionalHelper->isDotmailerTemplate($templateCode);
    }
}
