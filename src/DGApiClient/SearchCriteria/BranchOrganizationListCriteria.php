<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class BranchRubricListCriteria
 */
class BranchOrganizationListCriteria extends BranchSearchCriteria
{

    protected $requiredAttributes = array(
        'org_id',
    );

    public function __construct(array $values = array())
    {
        $this->allowedAttributes += array(
            'point',
            'radius',
        );
        return parent::__construct($values);
    }

    public static function required($organizationId)
    {
        return new self(array('org_id' => $organizationId));
    }

    /**
     * @param float $lon
     * @param float $lat
     * @return $this
     */
    public function setPoint($lon, $lat)
    {
        $this->offsetSet('point', self::point($lon, $lat));
        return $this;
    }
}
