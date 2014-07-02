<?php

namespace DGApiClient\Exceptions;


class ConnectionException extends \Exception
{

    /* @var string $type */
    protected $type;

    public function getType()
    {
        return $this->type;
    }

    public function __construct($message = "", $code = 0, \Exception $previous = null, $type = "")
    {
        $this->type = $type;
        parent::__construct($message, $code, $previous);
    }
}
