<?php

namespace DGApiClient\Mappers\Geo;

/**
 * Class Parking
 * @package DGApiClient\Mappers\Geo
 * @property AdministrativeUnit[] $admDiv optional items.adm_div
 * @property string $subtype;
 * @property string $subtypeName;
 * @property \DGApiClient\Mappers\Address $address;
 * @property string $addressName;
 * @property int $levelCount;
 * @property bool $isPaid;
 * @property bool $isIncentive;
 * @property string $access;
 * @property string $accessName;
 * @property string $accessComment;
 * @property array $schedule;
 * @property array $capacity;
 * @property array $links;
 */
class Parking extends GeoObject
{
}
