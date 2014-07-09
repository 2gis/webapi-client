<?php

class RouteTest extends TransportDomainTestCase {

    /* @var int id of platform */
    private $platformId = '141420388156739';

    /* @var int id of region */
    private $regionId = 1;

    /* @var string name of route */
    private $routeName = '1';

    /* @var int id of route */
    private $routeId = 141343078744431;

    /* @var string type of route */
    private $routeType = 'bus, trolleybus, tram, shuttle_bus, metro';

    /* @var string fields of route */
    private $routeFields = 'items.region_id';

    /* @var int page of route */
    private $routePage = 1;

    /* @var int pageSize */
    private $routePageSize = 1;

    public function testGetRouteList()
    {
        $routes = $this->transport->getRouteList($this->regionId, $this->routeName, $this->routeType, $this->routePage,
            $this->routePageSize, $this->routeFields);
        $this->checkList($routes, '\DGApiClient\Mappers\Route', 'getRouteList');
    }

    public function testGetRouteListByPlatform()
    {
        $routes = $this->transport->getRouteListByPlatform($this->platformId, $this->routeFields);
        $this->checkList($routes, '\DGApiClient\Mappers\Route', 'getRouteList');
    }

    public function testGetRoute()
    {
        $route = $this->transport->getRoute($this->routeId, $this->routeFields);
        $this->assertTrue($route instanceof \DGApiClient\Mappers\Route);
    }
}



