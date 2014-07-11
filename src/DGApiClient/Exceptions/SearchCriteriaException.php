<?php

namespace DGApiClient\Exceptions;

class SearchCriteriaException extends Exception
{
    /**
     * @var string[]
     */
    protected $missedValues = array();

    protected $message = "Required attributes are missing";

    /**
     * @return string[]
     */
    public function getMissedValues()
    {
        return $this->missedValues;
    }

    public static function create(array $missed = array())
    {
        return new self("", 0, null, $missed);
    }

    public function __construct($message = "", $code = 0, \Exception $previous = null, array $missed = array())
    {
        $this->missedValues = $missed;
        parent::__construct(!empty($message) ? $message : $this->message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message} (" . implode(', ', $this->missedValues) . "). ";
    }
}
