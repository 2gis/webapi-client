<?php

use \DGApiClient\Mappers\Station;
use \DGApiClient\Mappers\PlatformOfStation;

class StationTest extends TransportDomainTestCase {

    /* @var string name of station */
    private $stationName = 'Восход';

    /* @var int id of project */
    private $regionId = '1';

    /* @var int id of platform */
    private $platformId = '141420388156739';

    /* @var int id of station */
    private $stationId = '141523467371616';

    public function testGetStationList()
    {
        $stations = $this->transport->getStationList($this->stationName, $this->regionId);
        $this->checkList($stations, '\DGApiClient\Mappers\Station', 'getStationList');
    }

    public function testGetStationByPlatform()
    {
        $station = $this->transport->getStationByPlatform($this->platformId);
        $this->assertTrue($station instanceof Station);
    }

    public function testGetStation()
    {
        $station = $this->transport->getStation($this->stationId);
        $this->assertTrue($station instanceof Station);
    }

    public function testGetPlatform()
    {
        $station = $this->transport->getPlatform($this->platformId);
        $this->assertTrue($station instanceof PlatformOfStation);
    }
}