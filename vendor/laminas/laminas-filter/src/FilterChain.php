<?php

declare(strict_types=1);

namespace Laminas\Filter;

use Countable;
use Laminas\ServiceManager\ServiceManager;
use Laminas\Stdlib\PriorityQueue;
use ReturnTypeWillChange;
use Traversable;

use function call_user_func;
use function count;
use function get_class;
use function gettype;
use function is_array;
use function is_callable;
use function is_object;
use function sprintf;
use function strtolower;

/**
 * @final
 */
class FilterChain extends AbstractFilter implements Countable
{
    /**
     * Default priority at which filters are added
     */
    public const DEFAULT_PRIORITY = 1000;

    /** @var FilterPluginManager|null */
    protected $plugins;

    /**
     * Filter chain
     *
     * @var PriorityQueue
     */
    protected $filters;

    /**
     * Initialize filter chain
     *
     * @param null|array|Traversable $options
     */
    public function __construct($options = null)
    {
        $this->filters = new PriorityQueue();

        if (null !== $options) {
            $this->setOptions($options);
        }
    }

    /**
     * @param  array|Traversable $options
     * @return self
     * @throws Exception\InvalidArgumentException
     */
    public function setOptions($options)
    {
        if (! is_array($options) && ! $options instanceof Traversable) {
            throw new Exception\InvalidArgumentException(sprintf(
                'Expected array or Traversable; received "%s"',
                is_object($options) ? get_class($options) : gettype($options)
            ));
        }

        foreach ($options as $key => $value) {
            switch (strtolower($key)) {
                case 'callbacks':
                    foreach ($value as $spec) {
                        $callback = $spec['callback'] ?? false;
                        $priority = $spec['priority'] ?? static::DEFAULT_PRIORITY;
                        if ($callback) {
                            $this->attach($callback, $priority);
                        }
                    }
                    break;
                case 'filters':
                    foreach ($value as $spec) {
                        $name     = $spec['name'] ?? false;
                        $options  = $spec['options'] ?? [];
                        $priority = $spec['priority'] ?? static::DEFAULT_PRIORITY;
                        if ($name) {
                            $this->attachByName($name, $options, $priority);
                        }
                    }
                    break;
                default:
                    // ignore other options
                    break;
            }
        }

        return $this;
    }

    /**
     * Return the count of attached filters
     *
     * @return int
     */
    #[ReturnTypeWillChange]
    public function count()
    {
        return count($this->filters);
    }

    /**
     * Get plugin manager instance
     *
     * @return FilterPluginManager
     */
    public function getPluginManager()
    {
        $plugins = $this->plugins;
        if (! $plugins instanceof FilterPluginManager) {
            $plugins = new FilterPluginManager(new ServiceManager());
            $this->setPluginManager($plugins);
        }

        return $plugins;
    }

    /**
     * Set plugin manager instance
     *
     * @return self
     */
    public function setPluginManager(FilterPluginManager $plugins)
    {
        $this->plugins = $plugins;
        return $this;
    }

    /**
     * Retrieve a filter plugin by name
     *
     * @param string $name
     * @param array $options
     * @return FilterInterface|callable(mixed): mixed
     */
    public function plugin($name, array $options = [])
    {
        $plugins = $this->getPluginManager();
        return $plugins->get($name, $options);
    }

    /**
     * Attach a filter to the chain
     *
     * @param  callable(mixed): mixed|FilterInterface $callback A Filter implementation or valid PHP callback
     * @param  int $priority Priority at which to enqueue filter; defaults to 1000 (higher executes earlier)
     * @throws Exception\InvalidArgumentException
     * @return self
     */
    public function attach($callback, $priority = self::DEFAULT_PRIORITY)
    {
        if (! is_callable($callback)) {
            if (! $callback instanceof FilterInterface) {
                throw new Exception\InvalidArgumentException(sprintf(
                    'Expected a valid PHP callback; received "%s"',
                    is_object($callback) ? get_class($callback) : gettype($callback)
                ));
            }
            $callback = [$callback, 'filter'];
        }
        $this->filters->insert($callback, $priority);
        return $this;
    }

    /**
     * Attach a filter to the chain using a short name
     *
     * Retrieves the filter from the attached plugin manager, and then calls attach()
     * with the retrieved instance.
     *
     * @param  string $name
     * @param  mixed $options
     * @param  int $priority Priority at which to enqueue filter; defaults to 1000 (higher executes earlier)
     * @return self
     */
    public function attachByName($name, $options = [], $priority = self::DEFAULT_PRIORITY)
    {
        if (! is_array($options)) {
            $options = (array) $options;
        } elseif (empty($options)) {
            $options = null;
        }
        $filter = $this->getPluginManager()->get($name, $options);
        return $this->attach($filter, $priority);
    }

    /**
     * Merge the filter chain with the one given in parameter
     *
     * @return self
     */
    public function merge(FilterChain $filterChain)
    {
        foreach ($filterChain->filters->toArray(PriorityQueue::EXTR_BOTH) as $item) {
            $this->attach($item['data'], $item['priority']);
        }

        return $this;
    }

    /**
     * Get all the filters
     *
     * @return PriorityQueue
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * Returns $value filtered through each filter in the chain
     *
     * Filters are run in the order in which they were added to the chain (FIFO)
     *
     * @param  mixed $value
     * @return mixed
     */
    public function filter($value)
    {
        $chain = clone $this->filters;

        $valueFiltered = $value;
        foreach ($chain as $filter) {
            $valueFiltered = call_user_func($filter, $valueFiltered);
        }

        return $valueFiltered;
    }

    /**
     * Clone filters
     */
    public function __clone()
    {
        $this->filters = clone $this->filters;
    }

    /**
     * Prepare filter chain for serialization
     *
     * Plugin manager (property 'plugins') cannot
     * be serialized. On wakeup the property remains unset
     * and next invocation to getPluginManager() sets
     * the default plugin manager instance (FilterPluginManager).
     */
    public function __sleep()
    {
        return ['filters'];
    }
}
