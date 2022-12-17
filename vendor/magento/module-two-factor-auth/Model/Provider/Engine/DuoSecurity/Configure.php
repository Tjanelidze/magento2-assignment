<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magento\TwoFactorAuth\Model\Provider\Engine\DuoSecurity;

use Magento\TwoFactorAuth\Api\Data\DuoDataInterface;
use Magento\TwoFactorAuth\Api\Data\DuoDataInterfaceFactory;
use Magento\TwoFactorAuth\Api\DuoConfigureInterface;
use Magento\TwoFactorAuth\Api\TfaInterface;
use Magento\TwoFactorAuth\Model\Provider\Engine\DuoSecurity;
use Magento\TwoFactorAuth\Model\UserAuthenticator;

/**
 * Configure duo
 */
class Configure implements DuoConfigureInterface
{
    /**
     * @var UserAuthenticator
     */
    private $userAuthenticator;

    /**
     * @var DuoSecurity
     */
    private $duo;

    /**
     * @var DuoDataInterfaceFactory
     */
    private $dataFactory;

    /**
     * @var TfaInterface
     */
    private $tfa;

    /**
     * @var Authenticate
     */
    private $authenticate;

    /**
     * @param UserAuthenticator $userAuthenticator
     * @param DuoSecurity $duo
     * @param DuoDataInterfaceFactory $dataFactory
     * @param TfaInterface $tfa
     * @param Authenticate $authenticate
     */
    public function __construct(
        UserAuthenticator $userAuthenticator,
        DuoSecurity $duo,
        DuoDataInterfaceFactory $dataFactory,
        TfaInterface $tfa,
        Authenticate $authenticate
    ) {
        $this->userAuthenticator = $userAuthenticator;
        $this->duo = $duo;
        $this->dataFactory = $dataFactory;
        $this->tfa = $tfa;
        $this->authenticate = $authenticate;
    }

    /**
     * @inheritDoc
     */
    public function getConfigurationData(string $tfaToken): DuoDataInterface
    {
        $user = $this->userAuthenticator->authenticateWithTokenAndProvider($tfaToken, DuoSecurity::CODE);

        return $this->dataFactory->create(
            [
                'data' => [
                    DuoDataInterface::API_HOSTNAME => $this->duo->getApiHostname(),
                    DuoDataInterface::SIGNATURE => $this->duo->getRequestSignature($user)
                ]
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function activate(string $tfaToken, string $signatureResponse): void
    {
        $user = $this->userAuthenticator->authenticateWithTokenAndProvider($tfaToken, DuoSecurity::CODE);
        $userId = (int)$user->getId();

        $this->authenticate->assertResponseIsValid($user, $signatureResponse);
        $this->tfa->getProviderByCode(DuoSecurity::CODE)
            ->activate($userId);
    }
}
