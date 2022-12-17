<?php

namespace Yandex\Allure\Adapter\Model;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\XmlAttribute;

class Parameter implements Entity
{

    /**
     * @var string
     * @Type("string")
     * @XmlAttribute
     */
    private $name;

    /**
     * @var string
     * @Type("string")
     * @XmlAttribute
     */
    private $value;

    /**
     * @var string
     * @Type("string")
     * @XmlAttribute
     */
    private $kind;

    public function __construct($name, $value, $kind = ParameterKind::SYSTEM_PROPERTY)
    {
        $this->kind = ConstantChecker::validate('Yandex\Allure\Adapter\Model\ParameterKind', $kind);
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
