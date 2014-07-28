<?php

namespace DGApiClient\Mappers;

/**
 * Class Branch
 * @package DGApiClient\Mappers
 * @property int $id
 * @property int $regionId optional items.region_id
 * @property string $name
 * @property string $nameEx optional items.name_ex
 * @property string $alias optional items.alias
 * @property float[] $point optional items.point
 * @property string $regBcUrl
 * @property Geo\AdministrativeUnit[] $admDiv optional items.adm_div
 * @property Address $address optional items.address
 * @property string $addressName
 * @property string $addressComment
 * @property Organization $org optional items.org
 * @property array $attributeGroups optional items.attribute_groups
 * @property Rubric[] $rubrics
 * @property string $locale optional items.locale
 * @property string $schedule optional items.schedule
 * @property array $plusOne optional items.plus_one
 * @property string[] $booklet optional items.booklet
 * @property array $ads
 * @property array $dates
 * @property array $photos
 * @property array $seeAlso
 * @property array $externalProfiles
 * @property array $links
 * @property array $context
 * @property mixed $externalContent
 */
class Branch extends AbstractMapper
{
    public function setOrg($value)
    {
        $this->org = $this->factory->map($value, 'Organization');
    }
}
