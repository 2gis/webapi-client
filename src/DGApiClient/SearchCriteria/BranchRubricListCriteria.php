<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class BranchRubricListCriteria
 */
class BranchRubricListCriteria extends BranchRegionSearchCriteria
{

    protected $requiredAttributes = array(
        'region_id',
        'rubric_id'
    );

    public static function required($regionId, $rubricId)
    {
        return new self(array('region_id' => $regionId, 'rubric_id' => $rubricId));
    }
}
