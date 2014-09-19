<?php

namespace DGApiClient\Mappers\Geo;

/**
 * Class Building
 * @package DGApiClient\Mappers\Geo
 */
class Building extends GeoObject
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $fullName;

    /**
     * @var string
     */
    public $buildingName;

    /**
     * @var string
     */
    public $purposeName;

    /**
     * @var AdministrativeUnit[]
     */
    public $admDiv = array();

    /**
     * @var \DGApiClient\Mappers\Address
     */
    public $address;

    /**
     * @var string
     */
    public $addressName;

    /**
     * @var int[]
     */
    public $floors = array();

    /**
     * @var Attraction
     */
    public $attraction;

    /**
     * @var int
     */
    public $allowedForReviewsCount;

    /**
     * @var array
     */
    public $links = array();

    /**
     * @var array
     */
    public $context = array();
}
