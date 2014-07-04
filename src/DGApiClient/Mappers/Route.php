<?php
/**
 * Created by PhpStorm.
 * User: s.belyakov
 * Date: 7/4/14
 * Time: 10:31 AM
 */

namespace DGApiClient\Mappers;

class Route extends Mapper
{

    /* @var int */
    public $id;

    /* @var int */
    public $regionId;

    /* @var string */
    public $type;

    /* @var string */
    public $typeName;

    /* @var string */
    /* @brief available values (bus, trolleybus, tram, shuttle_bus, metro...and other)*/
    public $subtype;

    /* @var string */
    public $subtypeName;

    /* @var string */
    public $name;

    /* @var string */
    public $color;

    /* @var string */
    public $fromName;

    /* @var string */
    public $toName;

    /* @var mixed */
    public $context;
}
