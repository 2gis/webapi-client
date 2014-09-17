<?php

namespace DGApiClient\Mappers\Geo;

/**
 * Class Parking
 * @package DGApiClient\Mappers\Geo
 */
class Parking extends GeoObject
{
    /**
     * @var string
     */
    public $subtype;
    /**
     * @var AdministrativeUnit[] - optional items.adm_div
     */
    public $admDiv = array();
    /**
     * @var string
     */
    public $subtypeName;
    /**
     * @var \DGApiClient\Mappers\Address
     */
    public $address;
    /**
     * @var string
     */
    public $addressName;
    /**
     * @var int
     */
    public $levelCount;
    /**
     * @var bool
     */
    public $isPaid;
    /**
     * @var bool
     */
    public $isIncentive;
    /**
     * @var string
     */
    public $access;
    /**
     * @var string
     */
    public $accessName;
    /**
     * @var string
     */
    public $accessComment;
    /**
     * @var array
     */
    public $schedule = array();
    /**
     * @var array
     */
    public $capacity = array();
    /**
     * @var array
     */
    public $links = array();
}
