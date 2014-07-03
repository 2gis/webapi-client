<?php

namespace DGApiClient\Mappers;

class PlatformOfStation extends Mapper
{
    /* @var int */
    public $id;

    /* @var object */
    public $geometry;

    /* @var array */
    public $route_types;

    public static function factory($data, $className = __CLASS__)
    {
        return parent::factory($data, $className);
    }
}
