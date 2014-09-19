<?php

namespace DGApiClient\Mappers;

/**
 * Class Branch
 * @package DGApiClient\Mappers
 */
class Branch extends AbstractMapper
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int - optional items.region_id
     */
    public $regionId;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string - optional items.name_ex
     */
    public $nameEx;

    /**
     * @var string - optional items.alias
     */
    public $alias;

    /**
     * @var float[] - optional items.point
     */
    public $point = array();

    /**
     * @var string
     */
    public $regBcUrl;

    /**
     * @var Geo\AdministrativeUnit[] - optional items.adm_div
     */
    public $admDiv;

    /**
     * @var Address - optional items.address
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
     * @var Organization - optional items.org
     */
    public $org;

    /**
     * @var array - optional items.attribute_groups
     */
    public $attributeGroups;

    /**
     * @var Rubric[]
     */
    public $rubrics;

    /**
     * @var string - optional items.locale
     */
    public $locale;

    /**
     * @var string - optional items.schedule
     */
    public $schedule;

    /**
     * @var array - optional items.plus_one
     */
    public $plusOne;

    /**
     * @var string[] - optional items.booklet
     */
    public $booklet;

    /**
     * @var array
     */
    public $ads = array();

    /**
     * @var array
     */
    public $dates = array();

    /**
     * @var array
     */
    public $photos = array();

    /**
     * @var array
     */
    public $seeAlso = array();

    /**
     * @var array
     */
    public $externalProfiles = array();

    /**
     * @var array
     */
    public $links = array();

    /**
     * @var array
     */
    public $context = array();

    /**
     * @var mixed
     */
    public $externalContent;

    public function setOrg($value)
    {
        $this->org = $this->factory->map($value, 'Organization');
    }
}
