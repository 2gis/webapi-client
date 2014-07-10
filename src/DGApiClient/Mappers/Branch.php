<?php

namespace DGApiClient\Mappers;

class Branch extends Mapper
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

    /**
     * @param array $data
     * @param string $className
     * @return Branch
     * @throws \DGApiClient\Exceptions\Exception
     */
    public static function factory($data, $className = __CLASS__)
    {
        return parent::factory($data, $className);
    }

    public function setAddress($value)
    {
        $this->address = Address::factory($value);
    }

    public function setRubrics($values)
    {
        foreach ($values as $rubric) {
            $this->rubrics[] = Rubric::factory($rubric);
        }
    }

    public function setOrg($value)
    {
        $this->org = Organization::factory($value);
    }
}
