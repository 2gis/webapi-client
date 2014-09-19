<?php

namespace DGApiClient;

use \DGApiClient\Mappers;

/**
 * Class Transport
 * @package DGApiClient
 */
class Transport extends AbstractDomainClient
{

    /**
     * Поиск остановки
     * @param string $q
     * @param string $regionId
     * @link http://api.2gis.ru/doc/2.0/transport/station/search
     * @return mappers\Station[]|array
     */
    public function getStationList($q, $regionId)
    {
        return $this->getInternalList(
            'transport/station/search',
            'Station',
            array(
                'q' => (string)$q,
                'region_id' => (int)$regionId
            )
        );
    }

    /**
     * Поиск остановки по остановочной платформе
     * @param int $platformId
     * @param string $type
     * @link http://api.2gis.ru/doc/2.0/transport/station/get-by-platform-id
     * @return mappers\Station|bool
     */
    public function getStationByPlatform($platformId, $type = 'station')
    {
        return $this->getSingle(
            'transport/station/get',
            'Station',
            array(
                'type' => (string)$type,
                'platform_id' => (int)$platformId
            )
        );
    }

    /**
     * Получение заданной остановки
     * @param int $id
     * @param string $type
     * @link http://api.2gis.ru/doc/2.0/transport/station/get
     * @return mappers\Station|bool
     */
    public function getStation($id, $type = 'station')
    {
        return $this->getSingle(
            'transport/station/get',
            'Station',
            array(
                'type' => (string)$type,
                'id' => (int)$id
            )
        );
    }

    /**
     * Получение информациии об остановочной платформе
     * @param int $id
     * @link http://api.2gis.ru/doc/2.0/transport/station_platform/get
     * @return mappers\PlatformOfStation|bool
     */
    public function getPlatform($id)
    {
        return $this->getSingle(
            'transport/station_platform/get',
            'PlatformOfStation',
            array(
                'id' => (int)$id
            )
        );
    }

    /**
     * Поиск проезда на общественном транспорте
     * @param string $start (lon, lat)
     * @param string $end (lon, lat)
     * @param string $routeSubtypes
     * @param string $format
     * @link http://api.2gis.ru/doc/2.0/transport/calculate/routes
     * @return mappers\CalculateRoute[]|array
     */
    public function getCalculateRouteList($start, $end, $routeSubtypes, $format = 'json')
    {
        return $this->getInternalList(
            'transport/calculate_routes',
            'CalculateRoute',
            array(
                'start' => (string)$start,
                'end' => (string)$end,
                'route_subtypes' => (string)$routeSubtypes,
                'format' => (string)$format
            )
        );
    }

    /**
     * @param string $service
     * @param array $params
     * @return array
     */
    public function getResult($service, array $params = array())
    {
        $response = $this->client->send($service, $params);
        if (empty($response) || !is_array($response)) {
            return array();
        }
        return $response;
    }

    /**
     * Поиск проезда на автомобиле
     * @param string $waypoints string|json
     * @param string $time
     * @param string $routingType (optimal_statistic, shortest)
     * @param string $format
     * @link http://api.2gis.ru/doc/2.0/transport/calculate/directions
     * @return mappers\CalculateDirection[]|array
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
        return $this->getInternalList(
            'transport/calculate_directions',
            'CalculateDirection',
            array(
                'waypoints' => (string)$waypoints,
                'time' => (string)$time,
                'routing_type' => (string)$routingType,
                'format' => $format
            )
        );
    }

    /**
     * Поиск маршрутов
     * @param int $regionId
     * @param string $q
     * @param string $routeType
     * @param int $page
     * @param int $pageSize (1 - 2000)
     * @param string $fields
     * @link http://api.2gis.ru/doc/2.0/transport/route/search
     * @return mappers\Route[]|array
     */
    public function getRouteList($regionId, $q, $routeType = null, $page = 1, $pageSize = 20, $fields = null)
    {
        $params = array(
            'region_id' => (int)$regionId,
            'q' => (string)$q,
            'page' => (int)$page,
            'pageSize' => (int)$pageSize
        );
        if ($routeType) {
            $params['route_type'] = (string)$routeType;
        }
        if ($fields) {
            $params['fields'] = (string)$fields;
        }
        return $this->getInternalList(
            'transport/route/search',
            'Route',
            $params
        );
    }

    /**
     * Поиск маршрутов остановочной платформы
     * @param int $platformId
     * @param string $fields
     * @link http://api.2gis.ru/doc/2.0/transport/route/list-by-platform-id
     * @return mappers\Route[]|array
     */
    public function getRouteListByPlatform($platformId, $fields = null)
    {
        $params = array(
            'platform_id' => (int)$platformId,
        );
        if ($fields) {
            $params['fields'] = (string)$fields;
        }
        return $this->getInternalList(
            'transport/route/list',
            'Route',
            $params
        );
    }

    /**
     * Поиск маршрутов остановочной платформы
     * @param int $id
     * @param string $fields
     * @link http://api.2gis.ru/doc/2.0/transport/route/get
     * @return mappers\Route|bool
     */
    public function getRoute($id, $fields = null)
    {
        $params = array(
            'id' => (int)$id,
        );
        if ($fields) {
            $params['fields'] = (string)$fields;
        }
        return $this->getSingle(
            'transport/route/get',
            'Route',
            $params
        );
    }
}
