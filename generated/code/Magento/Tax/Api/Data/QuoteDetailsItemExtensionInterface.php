<?php
namespace Magento\Tax\Api\Data;

/**
 * ExtensionInterface class for @see \Magento\Tax\Api\Data\QuoteDetailsItemInterface
 */
interface QuoteDetailsItemExtensionInterface extends \Magento\Framework\Api\ExtensionAttributesInterface
{
    /**
     * @return float|null
     */
    public function getPriceForTaxCalculation();

    /**
     * @param float $priceForTaxCalculation
     * @return $this
     */
    public function setPriceForTaxCalculation($priceForTaxCalculation);

    /**
     * @return string|null
     */
    public function getVertexProductCode();

    /**
     * @param string $vertexProductCode
     * @return $this
     */
    public function setVertexProductCode($vertexProductCode);

    /**
     * @return bool|null
     */
    public function getVertexIsConfigurable();

    /**
     * @param bool $vertexIsConfigurable
     * @return $this
     */
    public function setVertexIsConfigurable($vertexIsConfigurable);

    /**
     * @return bool|null
     */
    public function getIsVirtual();

    /**
     * @param bool $isVirtual
     * @return $this
     */
    public function setIsVirtual($isVirtual);

    /**
     * @return string|null
     */
    public function getStoreId();

    /**
     * @param string $storeId
     * @return $this
     */
    public function setStoreId($storeId);

    /**
     * @return string|null
     */
    public function getQuoteId();

    /**
     * @param string $quoteId
     * @return $this
     */
    public function setQuoteId($quoteId);

    /**
     * @return string|null
     */
    public function getProductId();

    /**
     * @param string $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * @return string|null
     */
    public function getQuoteItemId();

    /**
     * @param string $quoteItemId
     * @return $this
     */
    public function setQuoteItemId($quoteItemId);

    /**
     * @return string|null
     */
    public function getCustomerId();

    /**
     * @param string $customerId
     * @return $this
     */
    public function setCustomerId($customerId);

    /**
     * @return \Vertex\Tax\Model\Data\CommodityCodeProduct|null
     */
    public function getVertexCommodityCode();

    /**
     * @param \Vertex\Tax\Model\Data\CommodityCodeProduct $vertexCommodityCode
     * @return $this
     */
    public function setVertexCommodityCode(\Vertex\Tax\Model\Data\CommodityCodeProduct $vertexCommodityCode);
}
