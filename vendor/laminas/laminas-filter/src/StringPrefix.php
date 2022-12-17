<?php

declare(strict_types=1);

namespace Laminas\Filter;

use Traversable;

use function get_class;
use function gettype;
use function is_object;
use function is_scalar;
use function is_string;
use function sprintf;

class StringPrefix extends AbstractFilter
{
    /** @var array<string, null|string> */
    protected $options = [
        'prefix' => null,
    ];

    /**
     * @param string|array|Traversable $options
     */
    public function __construct($options = null)
    {
        if ($options !== null) {
            $this->setOptions($options);
        }
    }

    /**
     * Set the prefix string
     *
     * @param  string $prefix
     * @return self
     * @throws Exception\InvalidArgumentException
     */
    public function setPrefix($prefix)
    {
        if (! is_string($prefix)) {
            throw new Exception\InvalidArgumentException(sprintf(
                '%s expects "prefix" to be string; received "%s"',
                __METHOD__,
                is_object($prefix) ? get_class($prefix) : gettype($prefix)
            ));
        }

        $this->options['prefix'] = $prefix;

        return $this;
    }

    /**
     * Returns the prefix string, which is appended at the beginning of the input value
     *
     * @return string
     */
    public function getPrefix()
    {
        if (! isset($this->options['prefix'])) {
            throw new Exception\InvalidArgumentException(sprintf(
                '%s expects a "prefix" option; none given',
                self::class
            ));
        }

        return $this->options['prefix'];
    }

    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        if (! is_scalar($value)) {
            return $value;
        }

        $value = (string) $value;

        return $this->getPrefix() . $value;
    }
}
