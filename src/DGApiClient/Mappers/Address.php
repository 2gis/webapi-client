<?php

namespace DGApiClient\Mappers;

/**
 * Class Address
 * @package DGApiClient\Mappers
 */
class Address extends AbstractMapper
{
    /**
     * @var int
     */
    public $buildingId;

    /**
     * @var string
     */
    public $postcode;

    /**
     * @var array
     */
    public $components = array();

    /**
     * @var string
     */
    public $regBcUrl;
}
