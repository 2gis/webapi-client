<?php

namespace DGApiClient\Mappers;

class Branch extends Mapper
{
    /* @var int */
    public $id;

    /* @var string */
    public $name;

    /* @var string */
    public $regBcUrl;

    /* @var string */
    public $addressName;

    /* @var Address */
    public $address;

    /* @var Rubric[] */
    public $rubrics = array();

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
}
