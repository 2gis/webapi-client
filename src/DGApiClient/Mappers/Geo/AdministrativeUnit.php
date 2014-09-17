<?php

namespace DGApiClient\Mappers\Geo;

/**
 * Class AdministrativeUnit
 * @package DGApiClient\Mappers\Geo
 */
class AdministrativeUnit extends GeoObject
{
    /**
     * @var string
     */
    public $subtype;

    /**
     * @var string
     */
    public $subtypeName;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $fullName;

    /**
     * @var AdministrativeUnit[]
     */
    public $admDiv = array();

    /**
     * @var Attraction
     */
    public $attraction;

    /**
     * @var array
     */
    public $statistics = array();

    /**
     * @var array
     */
    public $links = array();
}
