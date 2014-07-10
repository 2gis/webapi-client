<?php

namespace DGApiClient\SearchCriteria;

use DGApiClient\Exceptions\SearchCriteriaException;

abstract class AbstractSearchCriteria implements \ArrayAccess, \Countable, \Serializable
{

    protected $attributes = array();

    protected $allowedAttributes = array();

    protected $requiredAttributes = array();

    /**
     * @param array $values
     */
    public function __construct(array $values = array())
    {
        foreach ($this->requiredAttributes as $value) {
            if (!in_array($value, $this->allowedAttributes)) {
                $this->allowedAttributes[] = $value;
            }
        }
        foreach ($values as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    /**
     * @return array
     * @throws SearchCriteriaException
     */
    public function toArray()
    {
        if (($missed = $this->validateRequired()) !== array()) {
            throw SearchCriteriaException::create($missed);
        }
        $result = $this->attributes;
        // @todo для каждого поля allowedAttributes
        array_walk($result, function (&$item) {
            if (is_array($item)) {
                $item = implode(',', $item);
            }
        });
        return $result;
    }

    /**
     * @return string
     */
    public function serialize()
    {
        return serialize($this->attributes);
    }

    /**
     * @param string $data
     */
    public function unserialize($data)
    {
        $this->attributes = unserialize($data);
    }

    public function __invoke()
    {
        return $this->toArray();
    }

    public function __set($name , $value)
    {
        if ($this->offsetExists($name)) {
            $this->offsetSet($name, $value);
        } else {
            throw new \InvalidArgumentException("Argument $name not exists");
        }
    }

    public function __get($name)
    {
        if ($this->offsetExists($name)) {
            return $this->offsetGet($name);
        } else {
            throw new \InvalidArgumentException("Argument $name not exists");
        }
    }

    /**
     * @return array missed variables
     */
    private function validateRequired()
    {
        $missed = array();
        foreach ($this->requiredAttributes as $key) {
            if (empty($this->attributes[$key])) {
                $missed[] = $key;
            }
        }
        return $missed;
    }

    /**
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $attribute
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($attribute)
    {
        return in_array($attribute, $this->allowedAttributes);
    }

    /**
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $attribute
     * @return mixed Can return all value types.
     */
    public function offsetGet($attribute)
    {
        return $this->attributes[$attribute];
    }

    /**
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $attribute
     * @param mixed $value
     * @return void
     */
    public function offsetSet($attribute, $value)
    {
        if (in_array($attribute, $this->allowedAttributes)) {
            $this->attributes[$attribute] = $value;
        }
    }

    /**
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->attributes);
    }

    /**
     * @param float $lon
     * @param float $lat
     * @return string
     */
    public static function point($lon, $lat)
    {
        return $lon . ',' . $lat;
    }

    /**
     * @param string $attr
     * @return float[]
     */
    public function getPoint($attr = 'point')
    {
        $point = $this->offsetGet($attr);
        if (!empty($point)) {
            return explode(',', $point);
        } else {
            return array(null, null);
        }
    }
}
