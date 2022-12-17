<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\TwoFactorAuth\Test\Integration\Block;

use Magento\Authorization\Model\CompositeUserContext;
use Magento\Backend\Model\Auth;
use Magento\Backend\Model\Auth\Session;
use Magento\Framework\View\LayoutInterface;
use Magento\Security\Model\Plugin\Auth as AuthPlugin;
use Magento\TestFramework\Bootstrap as TestFrameworkBootstrap;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TwoFactorAuth\Api\TfaInterface;
use Magento\TwoFactorAuth\Block\ChangeProvider;
use Magento\TwoFactorAuth\Model\Provider\Engine\Authy;
use Magento\TwoFactorAuth\Model\Provider\Engine\Google;
use Magento\User\Model\Authorization\AdminSessionUserContext;
use PHPUnit\Framework\TestCase;

/**
 * @magentoDbIsolation enabled
 */
class ChangeProviderTest extends TestCase
{
    /**
     * @var ChangeProvider
     */
    private $block;

    /**
     * @var Session
     */
    private $session;

    /**
     * @var TfaInterface
     */
    private $tfa;

    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $objectManager->configure([
            CompositeUserContext::class => [
                'arguments' => [
                    'userContexts' => [
                        'adminSessionUserContext' => [
                            'type' => ['instance' => AdminSessionUserContext::class],
                            'sortOrder' => 10
                        ]
                    ]
                ]
            ]
        ]);
        $auth = $objectManager->get(Auth::class);
        $auth->login(TestFrameworkBootstrap::ADMIN_NAME, TestFrameworkBootstrap::ADMIN_PASSWORD);
        $objectManager->get(AuthPlugin::class)
            ->afterLogin($auth);
        $this->session = $auth->getAuthStorage();
        $this->tfa = Bootstrap::getObjectManager()->get(TfaInterface::class);
        $this->block = $objectManager->get(LayoutInterface::class)
            ->createBlock(ChangeProvider::class);
        $this->block->setData('area', 'adminhtml');
        $this->block->setTemplate('Magento_TwoFactorAuth::tfa/change_provider.phtml');
    }

    /**
     * @magentoConfigFixture default/twofactorauth/general/force_providers authy,duo_security
     * @magentoConfigFixture default/twofactorauth/authy/api_key abc123
     * @magentoConfigFixture default/twofactorauth/duo/integration_key abc123
     * @magentoConfigFixture default/twofactorauth/duo/api_hostname abc123
     * @magentoConfigFixture default/twofactorauth/duo/secret_key abc123
     */
    public function testBlockRendersWithActiveProviders(): void
    {
        $userId = (int)$this->session->getUser()->getId();
        $this->tfa->getProvider(Authy::CODE)->activate($userId);
        $jsLayout = json_decode($this->block->getJsLayout(), true);
        $actualProviders = array_map(
            function ($item) {
                return $item['code'];
            },
            $jsLayout['components']['tfa-change-provider']['providers']
        );

        self::assertSame(['authy'], $actualProviders);
    }

    /**
     * @magentoConfigFixture default/twofactorauth/general/force_providers authy,duo_security
     * @magentoConfigFixture default/twofactorauth/authy/api_key abc123
     * @magentoConfigFixture default/twofactorauth/duo/integration_key abc123
     * @magentoConfigFixture default/twofactorauth/duo/api_hostname abc123
     * @magentoConfigFixture default/twofactorauth/duo/secret_key abc123
     */
    public function testBlockRendersWhenCurrentProviderIsActivated(): void
    {
        $userId = (int)$this->session->getUser()->getId();
        $this->tfa->getProvider(Authy::CODE)->activate($userId);
        $this->block->setData('provider', 'authy');
        $html = $this->block->toHtml();

        self::assertStringContainsString('id="tfa', $html);
    }

    /**
     * @magentoConfigFixture default/twofactorauth/general/force_providers authy,duo_security
     * @magentoConfigFixture default/twofactorauth/authy/api_key abc123
     * @magentoConfigFixture default/twofactorauth/duo/integration_key abc123
     * @magentoConfigFixture default/twofactorauth/duo/api_hostname abc123
     * @magentoConfigFixture default/twofactorauth/duo/secret_key abc123
     */
    public function testBlockRendersWhenCurrentProviderIsNotActivated(): void
    {
        $userId = (int)$this->session->getUser()->getId();
        $this->tfa->getProvider(Authy::CODE)->activate($userId);
        $this->block->setData('provider', 'duo_security');
        $html = $this->block->toHtml();

        self::assertSame('', $html);
    }
}
