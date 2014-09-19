<?php

namespace DGApiClient\Mappers\Geo;

/**
 * Class Street
 * @package DGApiClient\Mappers\Geo
 */
class Street extends GeoObject
{
    /**
     * @var Attraction
     */
    public $attraction;

    /**
     * @var array
     */
    public $statistics = array();
}
