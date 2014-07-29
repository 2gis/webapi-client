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
        $this->setClassMap($classMap);
    }

    public function setClassMap(array $classMap = array())
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
        $className = $this->getClassName($className, $data);
        $object = new $className($this);
        if (!$object instanceof MapperInterface) {
            throw new Exception("$className must implement MapperInterface");
        }
        /* @var MapperInterface $object */
        return $object->populate($data);
    }

    /**
     * @param string|callable $name
     * @param mixed $data
     * @return string
     * @throws \DGApiClient\Exceptions\Exception
     */
    public function getClassName($name, $data = null)
    {
        if (is_callable($name)) {
            return $this->getClassName(call_user_func($name, $data));
        } else {
            $className = isset($this->maps[$name]) ? $this->maps[$name] : '\\' . __NAMESPACE__ . '\\' . $name;
        }
        if (class_exists($className)) {
            return $className;
        }
        throw new Exception(
            "Undefined " . (is_callable($name) ? 'callable(' . print_r($name, true) .')' : "class " . $name)
        );
    }

    public function setRubrics($values)
    {
        foreach ($values as $rubric) {
            $this->rubrics[] = $this->factory->map($rubric, 'Rubric');
        }
    }
}
