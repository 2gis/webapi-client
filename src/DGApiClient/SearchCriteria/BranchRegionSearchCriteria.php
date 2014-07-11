<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class BranchRegionSearchCriteria
 * @property int $region_id
 */
class BranchRegionSearchCriteria extends BranchSearchCriteria
{

    protected $requiredAttributes = array(
        'region_id'
    );

    public static function required($regionId)
    {
        return new self(array('region_id' => $regionId));
    }
}
