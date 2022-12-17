<?php

namespace Yandex\Allure\Adapter\Model;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;
use JMS\Serializer\Annotation\XmlRoot;
use JMS\Serializer\Annotation\XmlValue;

/**
 * @package Yandex\Allure\Adapter\Model
 * @XmlRoot("description")
 */
class Description implements Entity
{

    /**
     * @Type("string")
     * @XmlAttribute
     */
    private $type;

    /**
     * @Type("string")
     * @XmlValue
     */
    private $value;

    public function __construct($type, $value)
    {
        $this->type = ConstantChecker::validate('Yandex\Allure\Adapter\Model\DescriptionType', $type);
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
