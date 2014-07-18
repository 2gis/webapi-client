<?php

namespace DGApiClient\Mappers;

class Branch extends AbstractMapper
{
    /**
     * @var int
     */
    public $id;

    /**
     * Additional items.region_id
     * @var int
     */
    public $regionId;

    /**
     * @var string
     */
    public $name;

    /**
     * Additional items.name_ex
     * @var string
     */
    public $nameEx;

    /**
     * Additional items.alias
     * @var string
     */
    public $alias;

    /**
     * Additional items.point
     * @var float[]
     */
    public $point;

    /**
     * @var string
     */
    public $regBcUrl;

    /**
     * Additional items.adm_div
     * @var array
     */
    public $admDiv;

    /**
     * Additional items.address
     * @var Address
     */
    public $address;

    /**
     * @var string
     */
    public $addressName;

    /**
     * @var string
     */
    public $addressComment;


    /**
     * Additional items.org
     * @var Organization
     */
    public $org;

    /**
     * Additional items.attribute_groups
     * @var array
     */
    public $attributeGroups = array();

    /**
     * @var Rubric[]
     */
    public $rubrics = array();

    /**
     * Additional items.locale
     * @var string
     */
    public $locale;

    /**
     * Additional items.schedule
     * @var string
     */
    public $schedule;

    /**
     * Additional items.plus_one
     * @var array
     */
    public $plusOne;

    /**
     * Additional items.booklet
     * @var string[]
     */
    public $booklet;

    /**
     * @var array
     */
    public $ads;

    /**
     * @var array
     */
    public $dates;

    /**
     * @var array
     */
    public $photos;

    /**
     * @var array
     */
    public $seeAlso;

    /**
     * @var array
     */
    public $externalProfiles;

    /**
     * Additional items.links
     * @var array
     */
    public $links;

    /**
     * @var array
     */
    public $context;

    /**
     * @var mixed
     */
    public $externalContent;

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
