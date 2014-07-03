<?php

namespace DGApiClient\Mappers;

class CalculateRoute extends Mapper
{

    /* @var int */
    public $total_duration;

    /* @var int */
    public $transfer_count;

    /* @var int */
    public $crossing_count;

    /* @var array[]object */
    public $waypoints;

    /* @var array[]object */
    public $movements;
}
