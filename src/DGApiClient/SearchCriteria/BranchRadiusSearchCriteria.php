<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class BranchRadiusSearchCriteria
 * @property string|int[] $point
 * @property int $radius
 * @package DGApiClient\SearchCriteria
 */
class BranchRadiusSearchCriteria extends BranchSearchCriteria
{

    protected $requiredAttributes = array(
        'point'
    );

    public function __construct(array $values = array())
    {
        $this->allowedAttributes = array_merge(
            $this->allowedAttributes,
            array('point', 'radius')
        );
        return parent::__construct($values);
    }

    public static function required($centerLon, $centerLat)
    {
        $object = new self();
        return $object->setPoint($centerLon, $centerLat);
    }

    public function setPoint($lon, $lat)
    {
        $this->offsetSet('point', array($lon, $lat));
        return $this;
    }
}
