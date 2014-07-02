<?php

namespace DGApiClient\mappers;


class Address extends Mapper
{

    /* @var int */
    public $buildingId;

    /* @var int */
    public $postcode;

    /* @var string */
    public $regBcUrl;

    public static function factory($data, $className = __CLASS__)
    {
        return parent::factory($data, $className);
    }
}
