<?php

namespace DGApiClient\Mappers;

use DGApiClient\Exceptions\Exception;

class MapperFactory
{
    /**
     * Custom class mappings
     * Ex.: 'Address' => '\MyCustomAddress',
     * @var array
     */
    private $maps = array();

    public function __construct(array $classMap = array())
    {
        $this->maps = $classMap;
    }

    /**
     * @param array $data
     * @param string $className
     * @return MapperInterface
     * @throws \DGApiClient\Exceptions\Exception
     */
    public function map($data, $className = __CLASS__)
    {
        $className = $this->getClassName($className);
        $object = new $className($this);
        if (!$object instanceof MapperInterface) {
            throw new Exception("$className must implement MapperInterface");
        }
        /* @var MapperInterface $object */
        return $object->populate($data);
    }

    /**
     * @param string $name
     * @return string
     * @throws \DGApiClient\Exceptions\Exception
     */
    protected function getClassName($name)
    {
        $className = isset($this->maps[$name]) ? $this->maps[$name] : '\\' . __NAMESPACE__ . '\\' . $name;
        if (class_exists($className)) {
            return $className;
        }
        throw new Exception("Undefined class $name");
    }
}
