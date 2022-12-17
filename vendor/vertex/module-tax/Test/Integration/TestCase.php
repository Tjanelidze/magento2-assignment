<?php
/**
 * @copyright  Vertex. All rights reserved.  https://www.vertexinc.com/
 * @author     Mediotype                     https://www.mediotype.com/
 */

namespace Vertex\Tax\Test\Integration;

use Magento\Framework\ObjectManagerInterface;
use Magento\TestFramework\Helper\Bootstrap;
use Vertex\Tax\Service\ServiceActionPerformerFactory;
use Vertex\Tax\Service\SoapClientFactory;
use Vertex\Tax\Test\Integration\Mock\SoapFactoryMock;

/**
 * Responsible for containing functionality used by all Vertex Integration Tests
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var ObjectManagerInterface */
    private $objectManager;

    /**
     * Instantiate the Object Manager and setup the SoapFactory mocker
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->objectManager = Bootstrap::getObjectManager();
        $this->objectManager->configure(
            [
                'preferences' => [SoapClientFactory::class => SoapFactoryMock::class],
                ServiceActionPerformerFactory::class => [
                    'arguments' => [
                        'soapClientFactory' => [
                            'instance' => SoapFactoryMock::class
                        ]
                    ]
                ]
            ]
        );
    }

    /**
     * Retrieve the configured Object manager
     *
     * @return ObjectManagerInterface
     */
    public function getObjectManager()
    {
        return $this->objectManager;
    }

    /**
     * Get an instance of an object using the ObjectManager.
     *
     * @param string $className
     * @return object
     */
    protected function getObject($className)
    {
        return $this->getObjectManager()->get($className);
    }

    /**
     * Create an instance of an object using the ObjectManager.
     *
     * @param string $className
     * @param array $arguments
     * @return object
     */
    protected function createObject($className, array $arguments = [])
    {
        return $this->getObjectManager()->create($className, $arguments);
    }

    /**
     * Retrieve the SoapFactory that's been configured with the Object Manager
     *
     * @return SoapFactoryMock
     */
    public function getSoapFactory()
    {
        $factory = $this->objectManager->get(SoapClientFactory::class);
        if ($factory instanceof SoapFactoryMock) {
            return $factory;
        }
        throw new \RuntimeException('SoapClientFactory was not mock. Misconfiguration occurred.');
    }
}
