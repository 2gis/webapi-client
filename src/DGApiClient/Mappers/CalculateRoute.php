<?php

namespace DGApiClient\Mappers;

class CalculateRoute extends Mapper
{
    /* @var int */
    public $totalDuration;

    /* @var int */
    public $transferCount;

    /* @var int */
    public $crossingCount;

    /* @var object[] */
    public $waypoints;

    /* @var object[] */
    public $movements;
}
