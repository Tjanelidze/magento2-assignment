<?php

namespace Laminas\Captcha;

use Laminas\Validator\AbstractValidator;
use Traversable;

use function in_array;
use function is_array;
use function method_exists;
use function property_exists;
use function strtolower;
use function ucfirst;

/**
 * Base class for Captcha adapters
 *
 * Provides some utility functionality to build on
 */
abstract class AbstractAdapter extends AbstractValidator implements AdapterInterface
{
    /**
     * Captcha name
     *
     * Useful to generate/check form fields
     *
     * @var string
     */
    protected $name;

    /**
     * Captcha options
     *
     * @var array
     */
    protected $options = [];

    /**
     * Options to skip when processing options
     *
     * @var array
     */
    protected $skipOptions = [
        'options',
        'config',
    ];

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return AbstractAdapter Provides a fluent interface
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set single option for the object
     *
     * @param  string $key
     * @param  string $value
     * @return AbstractAdapter Provides a fluent interface
     */
    public function setOption($key, $value)
    {
        if (in_array(strtolower($key), $this->skipOptions)) {
            return $this;
        }

        $method = 'set' . ucfirst($key);
        if (method_exists($this, $method)) {
            // Setter exists; use it
            $this->$method($value);
            $this->options[$key] = $value;
        } elseif (property_exists($this, $key)) {
            // Assume it's metadata
            $this->$key          = $value;
            $this->options[$key] = $value;
        }
        return $this;
    }

    /**
     * Set object state from options array
     *
     * @param  array|Traversable $options
     * @throws Exception\InvalidArgumentException
     * @return AbstractAdapter Provides a fluent interface
     */
    public function setOptions($options = [])
    {
        if (! is_array($options) && ! $options instanceof Traversable) {
            throw new Exception\InvalidArgumentException(__METHOD__ . ' expects an array or Traversable');
        }

        foreach ($options as $key => $value) {
            $this->setOption($key, $value);
        }
        return $this;
    }

    /**
     * Retrieve options representing object state
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Get helper name used to render captcha
     *
     * By default, return empty string, indicating no helper needed.
     *
     * @return string
     */
    public function getHelperName()
    {
        return '';
    }
}
