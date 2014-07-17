<?php

namespace DGApiClient\Mappers;

class Branch extends AbstractMapper
{
    /* @var int */
    public $id;

    /* @var string */
    public $name;

    /* @var int */
    public $regionId;

    /* @var string */
    public $regBcUrl;

    /* @var string */
    public $addressName;

    /* @var Address */
    public $address;

    /* @var Organization */
    public $org;

    /* @var Rubric[] */
    public $rubrics = array();

    /* @var array */
    public $reviews;

    public $attributeGroups = array();

    public function setAddress($value)
    {
        $this->address = $this->factory->map($value, 'Address');
    }

    public function setRubrics($values)
    {
        foreach ($values as $rubric) {
            $this->rubrics[] = $this->factory->map($rubric, 'Rubric');
        }
    }

    public function setOrg($value)
    {
        $this->org = $this->factory->map($value, 'Organization');
    }
}
