<?php

/**
 * @see       https://github.com/laminas/laminas-soap for the canonical source repository
 * @copyright https://github.com/laminas/laminas-soap/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-soap/blob/master/LICENSE.md New BSD License
 */

namespace Laminas\Soap\Exception;

use InvalidArgumentException as SPLInvalidArgumentException;

/**
 * Exception thrown when one or more method arguments are invalid
 */
class InvalidArgumentException extends SPLInvalidArgumentException implements ExceptionInterface
{
}
