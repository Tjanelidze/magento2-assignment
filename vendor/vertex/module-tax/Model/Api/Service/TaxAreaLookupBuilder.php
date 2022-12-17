<?php
/**
 * @copyright  Vertex. All rights reserved.  https://www.vertexinc.com/
 * @author     Mediotype                     https://www.mediotype.com/
 */

namespace Vertex\Tax\Model\Api\Service;

use Vertex\Services\TaxAreaLookup;
use Vertex\Services\TaxAreaLookupFactory as SdkTaxAreaLookupFactory;
use Vertex\Tax\Model\Api\ConfigBuilder;
use Vertex\Utility\ServiceActionPerformerFactory;

/**
 * Create a {@see TaxAreaLookup} service class
 */
class TaxAreaLookupBuilder
{
    /** @var ConfigBuilder */
    private $configBuilder;

    /** @var string */
    private $scopeCode;

    /** @var string */
    private $scopeType;

    /** @var SdkTaxAreaLookupFactory */
    private $sdkFactory;

    /** @var ServiceActionPerformerFactory */
    private $serviceActionPerformerFactory;

    /**
     * @param ConfigBuilder $configBuilder
     * @param SdkTaxAreaLookupFactory $sdkFactory
     */
    public function __construct(
        ConfigBuilder $configBuilder,
        SdkTaxAreaLookupFactory $sdkFactory,
        ServiceActionPerformerFactory $serviceActionPerformerFactory
    ) {
        $this->configBuilder = $configBuilder;
        $this->sdkFactory = $sdkFactory;
        $this->serviceActionPerformerFactory =$serviceActionPerformerFactory;
    }

    /**
     * Create a Tax Area Lookup Service
     *
     * @return TaxAreaLookup
     */
    public function build()
    {
        $config = $this->configBuilder
            ->setScopeCode($this->scopeCode)
            ->setScopeType($this->scopeType)
            ->build();

        return $this->sdkFactory->create(
            [
                'configuration' => $config,
                'actionPerformerFactory'  => $this->serviceActionPerformerFactory
            ]
        );
    }

    /**
     * Set the Scope Code
     *
     * @param string|null $scopeCode
     * @return TaxAreaLookupBuilder
     */
    public function setScopeCode($scopeCode)
    {
        $this->scopeCode = $scopeCode;
        return $this;
    }

    /**
     * Set the Scope Type
     *
     * @param string|null $scopeType
     * @return TaxAreaLookupBuilder
     */
    public function setScopeType($scopeType)
    {
        $this->scopeType = $scopeType;
        return $this;
    }
}
