<?php

namespace DGApiClient\Mappers;

abstract class AbstractMapper implements MapperInterface
{
    /**
     * @var MapperFactory $factory
     */
    protected $factory;

    public function __construct(MapperFactory $mapperFactory = null)
    {
        $this->factory = $mapperFactory ? $mapperFactory : new MapperFactory();
    }

    /**
     * @param array $data
     * @return $this
     */
    public function populate(array $data)
    {
        foreach ($data as $key => $value) {
            $propertyName = self::keyToMethodName($key);
            $methodName = 'set' . ucfirst($propertyName);
            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            } elseif (property_exists($this, lcfirst($propertyName))) {
                $this->$propertyName = $value;
            }
        }
        return $this;
    }

    /**
     * Convert some_variable_name to someVariableName
     * @param string $keyName
     * @param bool $capitalizeFirstCharacter
     * @return string
     */
    protected static function keyToMethodName($keyName, $capitalizeFirstCharacter = false)
    {
        $str = str_replace(' ', '', ucwords(str_replace('_', ' ', $keyName)));
        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }
        return $str;
    }
}
