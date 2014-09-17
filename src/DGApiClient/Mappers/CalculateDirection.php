<?php

namespace DGApiClient\Mappers;

/**
 * Class CalculateDirection
 * @package DGApiClient\Mappers
 */
class CalculateDirection extends AbstractMapper
{
    /**
     * @var int
     */
    public $totalDuration;

    /**
     * @var int
     */
    public $totalDistance;

    /**
     * @var int
     */
    public $crossingCount;

    /**
     * @var array
     */
    public $legs = array();
}
