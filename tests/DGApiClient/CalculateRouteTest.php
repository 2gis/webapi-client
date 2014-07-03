<?php

use \DGApiClient\Mappers\CalculateRoute;

class CalculateRouteTest extends AbstractDomainTestCase {

    /* @var string */
    private $calculateRouteStart = '82.6973773218787, 54.9922473366522';

    /* @var string */
    private $calculateRouteEnd = '82.9477343592011, 55.0104089636166';

    /* @var string */
    private $calculateRouteSubtypes = 'bus, trolleybus, tram, shuttle_bus, metro';

    public function testGetCalculateRoutes()
    {
        $routes = $this->catalog->getCalculateRoutes(
            $this->calculateRouteStart,
            $this->calculateRouteEnd,
            $this->calculateRouteSubtypes
        );

        foreach ($routes as $route) {
            $this->assertTrue($route instanceof CalculateRoute);
        }
    }
}




