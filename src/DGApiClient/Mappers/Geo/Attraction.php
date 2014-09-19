<?php

namespace DGApiClient\Mappers\Geo;

/**
 * Class Attraction
 * @package DGApiClient\Mappers\Geo
 */
class Attraction extends GeoObject
{
    /**
     * @var AdministrativeUnit[] - optional items.adm_div
     */
    public $admDiv = array();

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $subtypeName;

    /**
     * @var string
     */
    public $fullName;

    /**
     * @var string - optional items.description
     */
    public $description;

    /**
     * @var string
     */
    public $dates;

    /**
     * @var string
     */
    public $authors;

    /**
     * @var array
     */
    public $context = array();
}
