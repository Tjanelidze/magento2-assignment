<?php
namespace Magento\Tax\Api\Data;

/**
 * Extension class for @see \Magento\Tax\Api\Data\QuoteDetailsItemInterface
 */
class QuoteDetailsItemExtension extends \Magento\Framework\Api\AbstractSimpleObject implements QuoteDetailsItemExtensionInterface
{
    /**
     * @return float|null
     */
    public function getPriceForTaxCalculation()
    {
        return $this->_get('price_for_tax_calculation');
    }

    /**
     * @param float $priceForTaxCalculation
     * @return $this
     */
    public function setPriceForTaxCalculation($priceForTaxCalculation)
    {
        $this->setData('price_for_tax_calculation', $priceForTaxCalculation);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getVertexProductCode()
    {
        return $this->_get('vertex_product_code');
    }

    /**
     * @param string $vertexProductCode
     * @return $this
     */
    public function setVertexProductCode($vertexProductCode)
    {
        $this->setData('vertex_product_code', $vertexProductCode);
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getVertexIsConfigurable()
    {
        return $this->_get('vertex_is_configurable');
    }

    /**
     * @param bool $vertexIsConfigurable
     * @return $this
     */
    public function setVertexIsConfigurable($vertexIsConfigurable)
    {
        $this->setData('vertex_is_configurable', $vertexIsConfigurable);
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsVirtual()
    {
        return $this->_get('is_virtual');
    }

    /**
     * @param bool $isVirtual
     * @return $this
     */
    public function setIsVirtual($isVirtual)
    {
        $this->setData('is_virtual', $isVirtual);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getStoreId()
    {
        return $this->_get('store_id');
    }

    /**
     * @param string $storeId
     * @return $this
     */
    public function setStoreId($storeId)
    {
        $this->setData('store_id', $storeId);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuoteId()
    {
        return $this->_get('quote_id');
    }

    /**
     * @param string $quoteId
     * @return $this
     */
    public function setQuoteId($quoteId)
    {
        $this->setData('quote_id', $quoteId);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getProductId()
    {
        return $this->_get('product_id');
    }

    /**
     * @param string $productId
     * @return $this
     */
    public function setProductId($productId)
    {
        $this->setData('product_id', $productId);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuoteItemId()
    {
        return $this->_get('quote_item_id');
    }

    /**
     * @param string $quoteItemId
     * @return $this
     */
    public function setQuoteItemId($quoteItemId)
    {
        $this->setData('quote_item_id', $quoteItemId);
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCustomerId()
    {
        return $this->_get('customer_id');
    }

    /**
     * @param string $customerId
     * @return $this
     */
    public function setCustomerId($customerId)
    {
        $this->setData('customer_id', $customerId);
        return $this;
    }

    /**
     * @return \Vertex\Tax\Model\Data\CommodityCodeProduct|null
     */
    public function getVertexCommodityCode()
    {
        return $this->_get('vertex_commodity_code');
    }

    /**
     * @param \Vertex\Tax\Model\Data\CommodityCodeProduct $vertexCommodityCode
     * @return $this
     */
    public function setVertexCommodityCode(\Vertex\Tax\Model\Data\CommodityCodeProduct $vertexCommodityCode)
    {
        $this->setData('vertex_commodity_code', $vertexCommodityCode);
        return $this;
    }
}
