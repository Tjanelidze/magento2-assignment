<?php

namespace Yandex\Allure\Adapter\Event;

use Yandex\Allure\Adapter\Model\Entity;
use Yandex\Allure\Adapter\Model\Failure;
use Yandex\Allure\Adapter\Model\TestCase;

abstract class TestCaseStatusChangedEvent implements TestCaseEvent
{
    /**
     * @var \Exception
     */
    private $exception;

    /**
     * @var string
     */
    private $message;

    /**
     * @return string
     */
    abstract protected function getStatus();

    public function process(Entity $context)
    {
        if ($context instanceof TestCase) {
            $context->setStatus($this->getStatus());
            $exception = $this->exception;
            if (isset($exception)) {
                $failure = new Failure($this->message);
                $failure->setStackTrace($exception->getTraceAsString());
                $context->setFailure($failure);
            }
        }
    }

    /**
     * @param string $message
     * @return $this
     */
    public function withMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param \Exception $exception
     * @return $this
     */
    public function withException($exception)
    {
        $this->exception = $exception;

        return $this;
    }
}
