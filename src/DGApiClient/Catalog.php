<?php

namespace DGApiClient;

use DGApiClient\Mappers\GeneralRubric;
use DGApiClient\Mappers\Rubric;

class Catalog extends AbstractDomainClient
{

    const SORT_NAME = 'name';
    const SORT_POPULARITY = 'popularity';

    /**
     * Поиск рубрик
     * @param int $regionId
     * @param int $parentId
     * @param string $sort
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/list
     * @return GeneralRubric[]|Rubric[]
     */
    public function getRubricList($regionId, $parentId = 0, $sort = self::SORT_NAME)
    {
        $response = $this->client->send('catalog/rubric/list', array(
            'region_id' => (int)$regionId,
            'parent_id' => (int)$parentId,
            'sort'      => $sort,
        ));

        if (!isset($response['items'])) {
            return array();
        }

        $result = array();
        foreach ($response['items'] as $value) {
            $result[] = GeneralRubric::factory($value);
        }
        return $result;
    }

    /**
     * Получение рубрики
     * @param int $id
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/get
     * @return GeneralRubric|Rubric|bool
     */
    public function getRubric($id)
    {
        return $this->getSingle(
            'catalog/rubric/get',
            __NAMESPACE__ . '\Mappers\GeneralRubric',
            array('id' => (int)$id)
        );
    }

    /**
     * Получение рубрики по псевдониму
     * @param string $alias
     * @param int $regionId
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/get-by-alias
     * @return GeneralRubric|Rubric|bool
     */
    public function getRubricByAlias($alias, $regionId)
    {
        return $this->getSingle(
            'catalog/rubric/get',
            __NAMESPACE__ . '\Mappers\GeneralRubric',
            array('alias' => $alias, 'region_id' => (int)$regionId)
        );
    }

    /**
     * Получение профиля филиала организации
     * @param int $id
     * @param array $additionalFields
     * @link http://api.2gis.ru/doc/2.0/catalog/profile/profile
     * @return mappers\Branch|bool
     */
    public function getBranch($id, array $additionalFields = array())
    {
        return $this->getSingle(
            'catalog/branch/get',
            __NAMESPACE__ . '\Mappers\Branch',
            array('id' => (int)$id, 'fields' => ApiConnection::getArray($additionalFields))
        );
    }

    /*
     * Поиск остановки
     * @param string $regionId
     * @link api.2gis.ru/doc/2.0/transport/station/search
     * @return mappers\Station|bool
     */
    public function getStationList($q, $regionId)
    {
        return $this->getList(
            'transport/station/search',
            __NAMESPACE__ . '\Mappers\Station',
            array(
                'q' => (string) $q,
                'region_id' => (int) $regionId
            )
        );
    }

    /*
     * Поиск остановки по остановочной платформе
     * @param int $platformId
     * @param string $type
     * @link api.2gis.ru/doc/2.0/transport/station/get-by-platform-id
     * @return mappers\Station|bool
     */
    public function getStationByPlatform($platformId, $type = 'station')
    {
        return $this->getSingle(
            'transport/station/get',
            __NAMESPACE__ . '\Mappers\Station',
            array(
                'type' => (int) $type,
                'platform_id' => (int) $platformId
            )
        );
    }

    /*
    * Получение заданной остановки
    * @param int $id
    * @param string $type
    * @link api.2gis.ru/doc/2.0/transport/station/get
    * @return mappers\Station|bool
    */
    public function getStation($id, $type = 'station')
    {
        return $this->getSingle(
            'transport/station/get',
            __NAMESPACE__ . '\Mappers\Station',
            array(
                'type' => (int) $type,
                'id' => (int) $id
            )
        );
    }

    /*
    * Получение информациии об остановочной платформе
    * @param int $id
    * @link api.2gis.ru/doc/2.0/transport/station_platform/get
    * @return mappers\PlatformOfStation|bool
    */
    public function getPlatform($id)
    {
        return $this->getSingle(
            'transport/station_platform/get',
            __NAMESPACE__ . '\Mappers\PlatformOfStation',
            array(
                'id' => (int) $id
            )
        );
    }

    /*
    * Поиск проезда на общественном транспорте
    * @param string $start (lon, lat)
    * @param string $end (lon, lat)
    * @param string $routeSubtypes
    * @param string $format
    * @link api.2gis.ru/doc/2.0/transport/calculate/routes
    * @return mappers\CalculateRoute|bool
    */
    public function getCalculateRouteList($start, $end, $routeSubtypes, $format = 'json')
    {
        return $this->getList(
            'transport/calculate_routes',
            __NAMESPACE__ . '\Mappers\CalculateRoute',
            array(
                'start' => (string) $start,
                'end' => (string) $end,
                'route_subtypes' => (string) $routeSubtypes,
                'format' => (string) $format
            )
        );
    }

    /*
    * Поиск проезда на автомобиле
    * @param string $waypoints string|json
    * @param string $time
    * @param string $routingType (optimal_statistic, shortest)
    * @param string $format
    * @link api.2gis.ru/doc/2.0/transport/calculate/directions
    * @return mappers\CalculateDirection|bool
    */
    public function getCalculateDirectionList(
        $waypoints,
        $time = null,
        $routingType = 'optimal_statistic',
        $format = 'json'
    ) {
        if (null === $time) {
            $time = new \DateTime();
            $time = $time->format('w:H:i');
        }
        return $this->getList(
            'transport/calculate_directions',
            __NAMESPACE__ . '\Mappers\CalculateDirection',
            array(
                'waypoints' => (string) $waypoints,
                'time' => (string) $time,
                'routing_type' => (string) $routingType,
                'format' => $format
            )
        );
    }

    /*
    * Поиск маршрутов
    * @param int $regionId
    * @param string $q
    * @param string $routeType
    * @param int $page
    * @param int $pageSize (1 - 2000)
    * @param string $fields
    * @link api.2gis.ru/doc/2.0/transport/route/search
    * @return mappers\Route|bool
    */
    public function getRouteList($regionId, $q, $routeType = null, $page = 1, $pageSize = 20, $fields = null)
    {
        $params = array(
            'region_id' => (int) $regionId,
            'q' => (string) $q,
            'page' => (int) $page,
            'pageSize' => (int) $pageSize
        );
        if ($routeType) {
            $params['route_type'] = (string) $routeType;
        }
        if ($fields) {
            $params['fields'] = (string) $fields;
        }
        return $this->getList(
            'transport/route/search',
            __NAMESPACE__ . '\Mappers\Route',
            $params
        );
    }

    /*
    * Поиск маршрутов остановочной платформы
    * @param int $platformId
    * @param string $fields
    * @link api.2gis.ru/doc/2.0/transport/route/list-by-platform-id
    * @return mappers\Route|bool
    */
    public function getRouteListByPlatform($platformId, $fields = null)
    {
        $params = array(
            'platform_id' => (int) $platformId,
        );
        if ($fields) {
            $params['fields'] = (string) $fields;
        }
        return $this->getList(
            'transport/route/list',
            __NAMESPACE__ . '\Mappers\Route',
            $params
        );
    }

    /*
   * Поиск маршрутов остановочной платформы
   * @param int $id
   * @param string $fields
   * @link api.2gis.ru/doc/2.0/transport/route/get
   * @return mappers\Route|bool
   */
    public function getRoute($id, $fields = null)
    {
        $params = array(
            'id' => (int) $id,
        );
        if ($fields) {
            $params['fields'] = (string) $fields;
        }
        return $this->getSingle(
            'transport/route/get',
            __NAMESPACE__ . '\Mappers\Route',
            $params
        );
    }
}
