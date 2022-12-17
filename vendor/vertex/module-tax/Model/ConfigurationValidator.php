<?php
/**
 * @copyright  Vertex. All rights reserved.  https://www.vertexinc.com/
 * @author     Mediotype                     https://www.mediotype.com/
 */

namespace Vertex\Tax\Model;

use Vertex\Exception\ApiException\ConnectionFailureException;
use Vertex\Exception\ConfigurationException;
use Vertex\Services\TaxAreaLookup\RequestInterface;
use Vertex\Services\TaxAreaLookup\RequestInterfaceFactory;
use Vertex\Tax\Api\QuoteInterface;
use Vertex\Tax\Api\TaxAreaLookupInterface;
use Vertex\Tax\Model\Api\Data\AddressBuilder;
use Vertex\Tax\Model\ConfigurationValidator\Result;
use Vertex\Tax\Model\ConfigurationValidator\ResultFactory;
use Vertex\Tax\Model\ConfigurationValidator\ValidSampleRequestBuilder;

/**
 * Validates the Credentials provided in the configuration
 */
class ConfigurationValidator
{
    /** @var AddressBuilder */
    private $addressBuilder;

    /** @var Config */
    private $config;

    /** @var RequestInterfaceFactory */
    private $lookupRequestFactory;

    /** @var QuoteInterface */
    private $quote;

    /** @var ResultFactory */
    private $resultFactory;

    /** @var ValidSampleRequestBuilder */
    private $sampleRequestFactory;

    /** @var TaxAreaLookupInterface */
    private $taxAreaLookup;

    /**
     * @param Config $config
     * @param AddressBuilder $addressBuilder
     * @param ValidSampleRequestBuilder $sampleRequestFactory
     * @param ResultFactory $resultFactory
     * @param QuoteInterface $quote
     * @param TaxAreaLookupInterface $taxAreaLookup
     * @param RequestInterfaceFactory $lookupRequestFactory
     */
    public function __construct(
        Config $config,
        Api\Data\AddressBuilder $addressBuilder,
        ValidSampleRequestBuilder $sampleRequestFactory,
        ResultFactory $resultFactory,
        QuoteInterface $quote,
        TaxAreaLookupInterface $taxAreaLookup,
        RequestInterfaceFactory $lookupRequestFactory
    ) {
        $this->config = $config;
        $this->addressBuilder = $addressBuilder;
        $this->sampleRequestFactory = $sampleRequestFactory;
        $this->resultFactory = $resultFactory;
        $this->quote = $quote;
        $this->taxAreaLookup = $taxAreaLookup;
        $this->lookupRequestFactory = $lookupRequestFactory;
    }

    /**
     * Validate configuration
     *
     * @param string $scopeType
     * @param string|int $scopeCode
     * @param bool $withoutCallValidation Skip validation that calls Vertex APIs
     * @return Result
     * @throws ConfigurationException
     */
    public function execute($scopeType, $scopeCode, $withoutCallValidation = false)
    {
        /** @var Result $result */
        $result = $this->resultFactory->create();

        $this->validateUriValid($result, $scopeType, $scopeCode);
        if (!$result->isValid()) {
            return $result;
        }

        $this->validateConfigurationCompatibility($result, $scopeType, $scopeCode);
        if (!$result->isValid()) {
            return $result;
        }

        $this->validateConfigurationComplete($result, $scopeType, $scopeCode);
        if (!$result->isValid()) {
            return $result;
        }

        $this->validateAddressComplete($result, $scopeType, $scopeCode);
        if (!$result->isValid()) {
            return $result;
        }

        if ($withoutCallValidation) {
            return $result;
        }

        $this->validateAddressLookup($result, $scopeType, $scopeCode);

        if ($result->isValid()) {
            $this->validateCalculationService($result, $scopeType, $scopeCode);
        }

        return $result;
    }

    /**
     * Validate Vertex Address WSDL Is Valid
     *
     * @param Result $result
     * @param string $scopeType
     * @param string|int $scopeCode
     * @return Result
     */
    private function validateUriValid(Result $result, $scopeType, $scopeCode)
    {
        $result->setValid(true);

        if (!filter_var($this->config->getVertexHost($scopeCode, $scopeType), FILTER_VALIDATE_URL)) {
            $result->setValid(false);
            $result->setMessage('Vertex Calculation API URL is not valid');
            return $result;
        }

        if (!filter_var($this->config->getVertexAddressHost($scopeCode, $scopeType), FILTER_VALIDATE_URL)) {
            $result->setValid(false);
            $result->setMessage('Vertex Address Validation API URL is not valid');
            return $result;
        }

        return $result;
    }

    /**
     * Validates that the Company Address has been configured in the admin
     *
     * @param Result $result
     * @param string $scopeType
     * @param string|int $scopeCode
     * @return Result
     */
    private function validateAddressComplete(Result $result, $scopeType, $scopeCode)
    {
        if (!$this->config->getCompanyRegionId($scopeCode, $scopeType)) {
            $missing[] = 'Company State';
        }

        if (!$this->config->getCompanyCountry($scopeCode, $scopeType)) {
            $missing[] = 'Company Country';
        }

        if (!$this->config->getCompanyStreet1($scopeCode, $scopeType)) {
            $missing[] = 'Company Street';
        }

        if (!$this->config->getCompanyCity($scopeCode, $scopeType) ||
            !$this->config->getCompanyPostalCode($scopeCode, $scopeType)
        ) {
            $missing[] = 'one of Company City or Postcode';
        }

        if (!empty($missing)) {
            $result->setMessage('Address Incomplete, Missing: %1');
            $result->setArguments([implode(', ', $missing)]);
            $result->setValid(false);
        } else {
            $result->setValid(true);
        }

        return $result;
    }

    /**
     * Validates the Company Address against the Lookup API
     *
     * @param Result $result
     * @param string $scopeType
     * @param string|int $scopeCode
     * @return Result
     * @throws ConfigurationException
     */
    private function validateAddressLookup(Result $result, $scopeType, $scopeCode)
    {
        $result->setValid(false);
        $street = [
            $this->config->getCompanyStreet1($scopeCode, $scopeType),
            $this->config->getCompanyStreet2($scopeCode, $scopeType)
        ];
        try {
            $address = $this->addressBuilder
                ->setScopeCode($scopeCode)
                ->setStreet($street)
                ->setCity($this->config->getCompanyCity($scopeCode, $scopeType))
                ->setRegionId($this->config->getCompanyRegionId($scopeCode, $scopeType))
                ->setPostalCode($this->config->getCompanyPostalCode($scopeCode, $scopeType))
                ->setCountryCode($this->config->getCompanyCountry($scopeCode, $scopeType))
                ->build();

            if ($address->getCountry() !== 'USA') {
                // skip validation for non-US countries
                $result->setValid(true);
                return $result;
            }

            /** @var RequestInterface $request */
            $request = $this->lookupRequestFactory->create();
            $request->setPostalAddress($address);

            $this->taxAreaLookup->lookup($request, $scopeCode, $scopeType);
            $result->setValid(true);
        } catch (ConfigurationException $e) {
            $result->setMessage('Unable to connect to Address Validation API');
        } catch (ConnectionFailureException $e) {
            $result->setMessage('Unable to connect to Address Validation API');
        } catch (\Exception $e) {
            $result->setMessage('Unable to validate address against API');
        }

        return $result;
    }

    /**
     * Verify Vertex API connectivity by performing a live tax calculation request.
     *
     * @param Result $result
     * @param string $scopeType
     * @param string|int $scopeCode
     * @return Result
     */
    private function validateCalculationService(Result $result, $scopeType, $scopeCode)
    {
        $result->setValid(false);
        try {
            $request = $this->sampleRequestFactory
                ->setScopeType($scopeType)
                ->setScopeCode($scopeCode)
                ->build();

            $this->quote->request($request, $scopeCode, $scopeType);
            $result->setValid(true);
        } catch (ConfigurationException $e) {
            $result->setMessage('Unable to connect to Calculation API');
        } catch (ConnectionFailureException $e) {
            $result->setMessage('Unable to connect to Calculation API');
        } catch (\Exception $e) {
            $result->setMessage('Unable to perform quote request');
        }

        return $result;
    }

    /**
     * Validates that Catalog Prices are not set to display including tax
     *
     * @param Result $result
     * @param string $scopeType
     * @param string|int $scopeCode
     * @return Result
     */
    private function validateConfigurationCompatibility(Result $result, $scopeType, $scopeCode)
    {
        if ($this->config->isVertexActive($scopeCode, $scopeType)
            && $this->config->isDisplayPriceInCatalogEnabled($scopeCode, $scopeType)) {
            $result->setValid(false);
            $result->setMessage('Automatically Disabled');
        } else {
            $result->setValid(true);
        }

        return $result;
    }

    /**
     * Validates that Vertex API, Lookup API, and Trusted ID have been configured in the admin
     *
     * @param Result $result
     * @param string $scopeType
     * @param string|int $scopeCode
     * @return Result
     */
    private function validateConfigurationComplete(Result $result, $scopeType, $scopeCode)
    {
        $missing = [];
        if (!$this->config->getVertexHost($scopeCode, $scopeType)) {
            $missing[] = 'Vertex API URL';
        }
        if (!$this->config->getVertexAddressHost($scopeCode, $scopeType)) {
            $missing[] = 'Address Lookup API URL';
        }

        if (!$this->config->getTrustedId($scopeCode, $scopeType)) {
            $missing[] = 'Trusted ID';
        }

        if (!empty($missing)) {
            $result->setMessage('Configuration Incomplete, Missing: %1');
            $result->setArguments([implode(', ', $missing)]);
            $result->setValid(false);
        } else {
            $result->setValid(true);
        }

        return $result;
    }
}
