<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class BranchBuildingListCriteria
 * @property int $building_id required
 * @property bool $servicing
 */
class BranchBuildingListCriteria extends BranchSearchCriteria
{

    protected $requiredAttributes = array(
        'building_id',
    );

    public static function required($buildingId)
    {
        return new self(array('building_id' => $buildingId));
    }

    public function __construct(array $values = array())
    {
        $this->allowedAttributes += array(
            'servicing',
        );
        return parent::__construct($values);
    }
}
