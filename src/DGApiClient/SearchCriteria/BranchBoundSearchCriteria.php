<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class BranchBoundSearchCriteria
 * @property string $point1
 * @property string $point2
 * @package DGApiClient\SearchCriteria
 */
class BranchBoundSearchCriteria extends BranchSearchCriteria
{

    const SORT_BOUND = 'bound';

    protected $requiredAttributes = array(
        'point1',
        'point2',
    );

    /**
     * @param float $point1_lon
     * @param float $point1_lat
     * @param float $point2_lon
     * @param float $point2_lat
     * @return BranchBoundSearchCriteria
     */
    public static function required($point1_lon, $point1_lat, $point2_lon, $point2_lat)
    {
        $object = new self();
        return $object->setPoint1($point1_lon, $point1_lat)->setPoint2($point2_lon, $point2_lat);
    }

    /**
     * @param float $lon
     * @param float $lat
     * @return $this
     */
    public function setPoint1($lon, $lat)
    {
        $this->offsetSet('point1', array($lon, $lat));
        return $this;
    }

    /**
     * @param float $lon
     * @param float $lat
     * @return $this
     */
    public function setPoint2($lon, $lat)
    {
        $this->offsetSet('point2', array($lon, $lat));
        return $this;
    }
}
