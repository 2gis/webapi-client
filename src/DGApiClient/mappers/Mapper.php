<?php

namespace DGApiClient\mappers;

use DGApiClient\exceptions\Exception;

abstract class Mapper
{

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
     * @param array $data
     * @param string $className
     * @return Mapper
     * @throws \DGApiClient\exceptions\Exception
     */
    public static function factory($data, $className = __CLASS__)
    {
        if (!is_subclass_of($className, '\\' . __NAMESPACE__ . '\Mapper')) {
            throw new Exception("$className must be subclass of Mapper");
        }
        /* @var Mapper $object */
        $object = new $className();
        return $object->populate($data);
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
