<?php

namespace DGApiClient\Mappers;

class PlatformOfStation extends Mapper
{
    /* @var int */
    public $id;

    /* @var int */
    public $regionId;

    /* @var int */
    public $stationId;

    /* @var string */
    public $name;

    /* @var string */
    public $type;

    /* @var string */
    public $typeName;

    /* @var string */
    public $subtype;

    /* @var string */
    public $subtypeName;

    /* @var object[] */
    public $admDiv;

    /* @var array */
    public $schedule;

    /* @var array */
    public $geometry;

    /* @var object[] */
    public $routes;

    /* @var array|Null */
    public $links;

    public static function factory($data, $className = __CLASS__)
    {
        return parent::factory($data, $className);
    }
}
