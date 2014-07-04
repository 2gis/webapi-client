<?php

error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/DGApiClient/AbstractDomainClient.php';
$config = require __DIR__ . '/../tests/config.php';
defined('API_KEY') or define('API_KEY', $config['autotestKey']);

$connection = new \DGApiClient\ApiConnection(API_KEY);

$catalog = new \DGApiClient\Catalog($connection);

//$data = $catalog->getStationList('Восход', 1);
//////
//print_r($data);

//$data = $catalog->getStationByPlatform('141420388156739');
//
//print_r($data);

//$data = $catalog->getCalculateRouteList(
//    '82.6973773218787, 54.9922473366522',
//    '82.9477343592011, 55.0104089636166',
//    'bus, trolleybus, tram, shuttle_bus, metro'
//);
////
//print_r($data);

//$waypoints = '82.838287 54.96579, 82.838287 54.96579';
//$data = $catalog->getCalculateDirectionList($waypoints);
//print_r($data);
//$data = $catalog->getRouteListByPlatform(141420388156739);
$data = $catalog->getRoute(141343078744431);
print_r($data);

print('it s ok' . PHP_EOL);



