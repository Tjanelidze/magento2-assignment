<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\TwoFactorAuth\Test\Integration\Controller\Adminhtml\Duo;

use Magento\Framework\HTTP\PhpEnvironment\Request;
use Magento\TwoFactorAuth\TestFramework\TestCase\AbstractConfigureBackendController;

/**
 * Test for the DuoSecurity form processor.
 *
 * @magentoAppArea adminhtml
 * @magentoDbIsolation enabled
 */
class AuthpostTest extends AbstractConfigureBackendController
{
    /**
     * @inheritDoc
     */
    protected $uri = 'backend/tfa/duo/authpost';

    /**
     * @inheritDoc
     */
    protected $httpMethod = Request::METHOD_POST;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->expectedNoAccessResponseCode = 302;
    }

    /**
     * @inheritDoc
     * @magentoConfigFixture default/twofactorauth/general/force_providers duo_security
     * @magentoConfigFixture default/twofactorauth/duo/integration_key duo_security
     * @magentoConfigFixture default/twofactorauth/duo/secret_key duo_security
     * @magentoConfigFixture default/twofactorauth/duo/api_hostname duo_security
     * @magentoConfigFixture default/twofactorauth/duo/application_key duo_security
     */
    public function testTokenAccess(): void
    {
        parent::testTokenAccess();
        //Redirect when isAllowed returns false
        $this->assertRedirect($this->stringContains('auth/login'));
    }

    /**
     * @inheritDoc
     * @magentoConfigFixture default/twofactorauth/general/force_providers duo_security
     * @magentoConfigFixture default/twofactorauth/duo/integration_key duo_security
     * @magentoConfigFixture default/twofactorauth/duo/secret_key duo_security
     * @magentoConfigFixture default/twofactorauth/duo/api_hostname duo_security
     * @magentoConfigFixture default/twofactorauth/duo/application_key duo_security
     */
    public function testAclHasAccess()
    {
        $this->expectedNoAccessResponseCode = 200;
        parent::testAclHasAccess();
        //Redirect that Authpost supplies when signatures is not provided in a request.
        $this->assertRedirect($this->stringContains('duo/auth'));
    }

    /**
     * @inheritDoc
     * @magentoConfigFixture default/twofactorauth/general/force_providers duo_security
     * @magentoConfigFixture default/twofactorauth/duo/integration_key duo_security
     * @magentoConfigFixture default/twofactorauth/duo/secret_key duo_security
     * @magentoConfigFixture default/twofactorauth/duo/api_hostname duo_security
     * @magentoConfigFixture default/twofactorauth/duo/application_key duo_security
     */
    public function testAclNoAccess()
    {
        parent::testAclNoAccess();
        //Redirect when isAllowed returns false
        $this->assertRedirect($this->stringContains('auth/login'));
    }
}
