<?php

namespace DGApiClient\Mappers\Geo;

/**
 * Class Gate
 * @package DGApiClient\Mappers\Geo
 */
class Gate extends GeoObject
{
    /**
     * @var AdministrativeUnit[] - optional items.adm_div
     */
    public $admDiv;

    /**
     * @var string
     */
    public $fullName;

    /**
     * @var string
     */
    public $purpose;

    /**
     * @var string
     */
    public $purposeName;

    /**
     * @var string
     */
    public $access;

    /**
     * @var string
     */
    public $accessName;

    /**
     * @var string
     */
    public $accessComment;

    /**
     * @var string
     */
    public $barrier;

    /**
     * @var string
     */
    public $barrierName;
}
