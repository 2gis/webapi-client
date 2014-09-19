<?php

namespace DGApiClient\Mappers\Geo;

use DGApiClient\Exceptions\Exception;
use DGApiClient\Mappers\AbstractMapper;

/**
 * Class GeoObject
 * @package DGApiClient\Mappers\Geo
 */
class GeoObject extends AbstractMapper
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $geometry;

    /**
     * @var string
     */
    public $type;

    /**
     * @param array $data
     * @throws \DGApiClient\Exceptions\Exception
     * @return string
     */
    public static function geoMapResolver($data)
    {
        if (!isset($data['type'])) {
            throw new Exception("Can't resolve mapper because of property 'type' not found in data");
        }
        switch ($data['type']) {
            case 'adm_div':
                return 'Geo\AdministrativeUnit';
            case 'building':
                return 'Geo\Building';
            case 'street':
                return 'Geo\Street';
            case 'attraction':
                return 'Geo\Attraction';
            case 'crossroad':
                return 'Geo\Crossroad';
            case 'parking':
                return 'Geo\Parking';
            case 'road':
                return 'Geo\Road';
            case 'gate':
                return 'Geo\Gate';
            case 'poi':
                return 'Geo\Poi';
            default:
                return 'Geo\GeoObject';
        }
    }

    protected function setAdmDiv($values)
    {
        $this->admDiv = array();
        foreach ($values as $unit) {
            $this->admDiv[] = $this->factory->map($unit, 'Geo\AdministrativeUnit');
        }
    }

    protected function setAttraction($value)
    {
        if ($value !== null) {
            $this->attraction = $this->factory->map($value, 'Geo\Attraction');
        }
    }
}
