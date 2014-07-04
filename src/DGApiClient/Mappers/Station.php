<?php

namespace DGApiClient\Mappers;


class Station extends Mapper
{

    /* @var int */
    public $id;

    /* @var string */
    public $regionId = '';

    /* @var string */
    public $name;

    /* @var string */
    public $type;

    /* @var string */
    public $subtype;

    /* @var string */
    public $subtypeName = '';

    /* @var array */
    public $admDiv = array();

    /* @var object|null  */
    public $schedule;

    /* @var array[]object  */
    public $platforms;

    /* @var array[]object  */
    public $routes = array();

    /* @var object|null  */
    public $links = array();

    public function setPlatforms($values)
    {
        foreach ($values as $platform) {
            $this->platforms[] = PlatformOfStation::factory($platform);
        }
    }
}
