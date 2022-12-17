<?php
/**
 * This file is part of the Klarna Core module
 *
 * (c) Klarna Bank AB (publ)
 *
 * For the full copyright and license information, please view the NOTICE
 * and LICENSE files that were distributed with this source code.
 */

namespace Klarna\Core\Model\System\Config\Source;

use Magento\Framework\Data\OptionSourceInterface;

class Version implements OptionSourceInterface
{
    /**
     * @var Base
     */
    private $base;

    /**
     * @param Base $base
     */
    public function __construct(Base $base)
    {
        $this->base = $base;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        $this->base->setOptionName('api_versions');
        $options = $this->base->toOptionArray();
        sort($options);
        return $options;
    }
}
