<?php

namespace Yandex\Allure\Adapter\Annotation;

/**
 * @Annotation
 * @Target({"METHOD"})
 * @package Yandex\Allure\Adapter\Annotation
 */
class TestType
{
    /**
     * @var string
     */
    public $type = "screenshotDiff";
}
