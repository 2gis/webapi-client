<?php

namespace DGApiClient\Mappers;


class Address extends Mapper
{

    /* @var int */
    public $buildingId;

    /* @var int */
    public $postcode;

    /* @var string */
    public $regBcUrl;

    /**
     * @param array $data
     * @param string $className
     * @return Address
     * @throws \DGApiClient\Exceptions\Exception
     */
    public static function factory($data, $className = __CLASS__)
    {
        return parent::factory($data, $className);
    }
}
