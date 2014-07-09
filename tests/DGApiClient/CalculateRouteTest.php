<?php

use \DGApiClient\Mappers\CalculateRoute;

class CalculateRouteTest extends TransportDomainTestCase {

    /* @var string */
    private $calculateRouteStart = '82.6973773218787, 54.9922473366522';

    /* @var string */
    private $calculateRouteEnd = '82.9477343592011, 55.0104089636166';

    /* @var string */
    private $calculateRouteSubtypes = 'bus, trolleybus, tram, shuttle_bus, metro';

    public function testGetCalculateRouteList()
    {
        $routes = $this->transport->getCalculateRouteList(
            $this->calculateRouteStart,
            $this->calculateRouteEnd,
            $this->calculateRouteSubtypes
        );

        $this->checkList($routes, '\DGApiClient\Mappers\CalculateRoute', 'getCalculateRouteList');

    }
}




