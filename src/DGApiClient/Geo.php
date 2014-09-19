<?php

namespace DGApiClient;

class Geo extends AbstractDomainClient
{
    /**
     * Список гео объектов
     * @param $regionId
     * @param string[] $type
     * @param int $page
     * @param int $pageSize
     * @param string[] $additionalFields
     * @throws Exceptions\Exception
     * @return \DGApiClient\Mappers\Geo\GeoObject[]
     */
    public function geoList(
        $regionId,
        $type = array(),
        $page = null,
        $pageSize = null,
        array $additionalFields = array()
    ) {
        return $this->getInternalList(
            'geo/list',
            array(__NAMESPACE__ . '\Mappers\Geo\GeoObject', 'geoMapResolver'),
            array(
                'region_id' => $regionId,
                'type' => self::getArray($type),
                'page' => $page,
                'page_size' => $pageSize,
                'fields' => self::getArray($additionalFields),
            )
        );
    }


    /**
     * Поиск гео объектов в радиусе, с заданным центром
     * @param $point
     * @param int $radius
     * @param int $page
     * @param string[] $type
     * @param int $page
     * @param int $pageSize
     * @param string[] $additionalFields
     * @throws Exceptions\Exception
     * @return \DGApiClient\Mappers\Geo\GeoObject[]
     */
     public function geoSearch(
            $point,
            $radius = 10,
            $type = array(),
            $page = null,
            $pageSize = null,
            array $additionalFields = array()
        ) {
            return $this->getInternalList(
                'geo/search',
                array(__NAMESPACE__ . '\Mappers\Geo\GeoObject', 'geoMapResolver'),
                array(
                    'point' => $point,
                    'radius' => $radius,
                    'type' => self::getArray($type),
                    'page' => $page,
                    'page_size' => $pageSize,
                    'fields' => self::getArray($additionalFields),
                )
            );
        }
}
