<?php

namespace DGApiClient\SearchCriteria;

abstract class AbstractSearchCriteria implements \ArrayAccess
{

    protected $attributes = array();

    protected $allowedAttributes = array();

    public function __construct(array $values = array())
    {
        foreach ($values as $key => $value) {
            $this->offsetSet($key, $value);
        }
    }

    public function toArray()
    {
        return array_filter($this->attributes);
    }

    /**
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $attribute
     * @return boolean true on success or false on failure.
     */
    public function offsetExists($attribute)
    {
        return array_key_exists($attribute, $this->allowedAttributes);
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
        if (array_key_exists($attribute, $this->allowedAttributes)) {
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
}
