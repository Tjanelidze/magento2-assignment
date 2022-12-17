<?php

declare(strict_types=1);

namespace Laminas\Filter;

use Traversable;

use function is_scalar;
use function mb_strtolower;
use function strtolower;

class StringToLower extends AbstractUnicode
{
    /** @var array */
    protected $options = [
        'encoding' => null,
    ];

    /**
     * Constructor
     *
     * @param string|array|Traversable $encodingOrOptions OPTIONAL
     */
    public function __construct($encodingOrOptions = null)
    {
        if ($encodingOrOptions !== null) {
            if (! static::isOptions($encodingOrOptions)) {
                $this->setEncoding($encodingOrOptions);
            } else {
                $this->setOptions($encodingOrOptions);
            }
        }
    }

    /**
     * Defined by Laminas\Filter\FilterInterface
     *
     * Returns the string $value, converting characters to lowercase as necessary
     *
     * If the value provided is non-scalar, the value will remain unfiltered
     *
     * @param  string $value
     * @return string|mixed
     */
    public function filter($value)
    {
        if (! is_scalar($value)) {
            return $value;
        }
        $value = (string) $value;

        if (null !== $this->getEncoding()) {
            return mb_strtolower($value, $this->options['encoding']);
        }

        return strtolower($value);
    }
}
