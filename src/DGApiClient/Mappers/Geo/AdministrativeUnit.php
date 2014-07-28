<?php

namespace DGApiClient\Mappers\Geo;

/**
 * Class AdministrativeUnit
 * @package DGApiClient\Mappers\Geo
 * @property string $subtype
 * @property string $subtypeName
 * @property string $name
 * @property string $fullName
 * @property AdministrativeUnit[] $admDiv optional items.adm_div
 * @property Attraction $attraction optional items.attraction
 * @property array $statistics optional items.statistics
 * @property array $links optional items.links
 */
class AdministrativeUnit extends GeoObject
{
}
