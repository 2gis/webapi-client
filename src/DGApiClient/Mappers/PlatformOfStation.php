<?php

namespace DGApiClient\Mappers;

class PlatformOfStation extends AbstractMapper
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
}
