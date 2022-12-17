<?php

/**
 * @copyright  Vertex. All rights reserved.  https://www.vertexinc.com/
 * @author     Mediotype Development         <diveinto@mediotype.com>
 */

namespace Vertex\Data;

/**
 * {@inheritDoc}
 */
class Tax implements TaxInterface
{
    /** @var float */
    private $calculatedTax;

    /** @var float */
    private $effectiveRate;

    /** @var string */
    private $imposition;

    /** @var string */
    private $impositionType;

    /** @var string */
    private $inputOutputType;

    /** @var JurisdictionInterface */
    private $jurisdiction;

    /** @var string */
    private $taxCollectedFromParty;

    /** @var string */
    private $taxResult;

    /** @var string */
    private $taxType;

    /** @var int[] */
    private $invoiceTextCodes;

    /** @var string */
    private $taxCode;

    /** @var string */
    private $vertexTaxCode;

    /**
     * @inheritdoc
     */
    public function getAmount()
    {
        return $this->calculatedTax;
    }

    /**
     * @inheritdoc
     */
    public function getCollectedFromParty()
    {
        return $this->taxCollectedFromParty;
    }

    /**
     * @inheritdoc
     */
    public function getEffectiveRate()
    {
        return $this->effectiveRate;
    }

    /**
     * @inheritdoc
     */
    public function getImposition()
    {
        return $this->imposition;
    }

    /**
     * @inheritdoc
     */
    public function getImpositionType()
    {
        return $this->impositionType;
    }

    /**
     * @inheritdoc
     */
    public function getInputOutputType()
    {
        return $this->inputOutputType;
    }

    /**
     * @inheritdoc
     */
    public function getJurisdiction()
    {
        return $this->jurisdiction;
    }

    /**
     * @inheritdoc
     */
    public function getResult()
    {
        return $this->taxResult;
    }

    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->taxType;
    }

    /**
     * @inheritdoc
     */
    public function getInvoiceTextCodes()
    {
        return $this->invoiceTextCodes;
    }

    /**
     * @inheritdoc
     */
    public function getTaxCode()
    {
        return $this->taxCode;
    }

    /**
     * @inheritdoc
     */
    public function getVertexTaxCode()
    {
        return $this->vertexTaxCode;
    }


    /**
     * @inheritdoc
     */
    public function setAmount($calculatedTax)
    {
        $this->calculatedTax = $calculatedTax;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setCollectedFromParty($party)
    {
        $this->taxCollectedFromParty = $party;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setEffectiveRate($effectiveRate)
    {
        $this->effectiveRate = $effectiveRate;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setImposition($imposition)
    {
        $this->imposition = $imposition;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setImpositionType($impositionType)
    {
        $this->impositionType = $impositionType;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setInputOutputType($type)
    {
        $this->inputOutputType = $type;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setJurisdiction($jurisdiction)
    {
        $this->jurisdiction = $jurisdiction;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setResult($result)
    {
        $this->taxResult = $result;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setType($type)
    {
        $this->taxType = $type;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setInvoiceTextCodes($codes)
    {
        $this->invoiceTextCodes = $codes;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setTaxCode($code)
    {
        $this->taxCode = $code;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function setVertexTaxCode($code)
    {
        $this->vertexTaxCode = $code;
        return $this;
    }
}
