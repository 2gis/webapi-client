<?php

use \DGApiClient\Mappers\Station;
use \DGApiClient\Mappers\PlatformOfStation;

class StationTest extends AbstractDomainTestCase {

    /* @var string name of station */
    private $stationName = 'Восход';

    /* @var int id of project */
    private $regionId = '1';

    /* @var int id of platform */
    private $platformId = '141420388156739';

    /* @var int id of station */
    private $stationId = '141523467371616';

    public function testGetStations()
    {
        $stations = $this->catalog->getStations($this->stationName, $this->regionId);
        foreach ($stations as $station) {
            $this->assertTrue($station instanceof Station);
        }
    }

    public function testGetStationByPlatform()
    {
        $station = $this->catalog->getStationByPlatform($this->platformId);
        $this->assertTrue($station instanceof Station);
    }

    public function testGetStation()
    {
        $station = $this->catalog->getStation($this->stationId);
        $this->assertTrue($station instanceof Station);
    }

    public function testGetPlatform()
    {
        $station = $this->catalog->getPlatform($this->platformId);
        $this->assertTrue($station instanceof PlatformOfStation);
    }
}