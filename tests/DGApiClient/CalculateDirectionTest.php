<?php

use \DGApiClient\Mappers\CalculateDirection;

class CalculateDirectionTest extends TransportDomainTestCase {

    /* @var string */
    private $wayPoints = '82.838287 54.96579,82.838287 54.86579';

    /* @var string */
    private $wayPointsWithSpaces = '82.838287   54.96579,    82.838287   54.86579';

    /* @var string*/
    private $service =  'transport/calculate_directions';

    public function testGetCalculateDirectionList()
    {
        $directions = $this->transport->getCalculateDirectionList($this->wayPoints);
        $this->checkList($directions, '\DGApiClient\Mappers\CalculateDirection', 'getCalculateDirectionList');
    }

    public function testGetCalculateDirectionsWithSpaces()
    {
        $directions = $this->transport->getCalculateDirectionList($this->wayPointsWithSpaces);
        $this->checkList($directions, '\DGApiClient\Mappers\CalculateDirection', 'getCalculateDirectionList');
    }

    public function testGetCalculateDirectionsWayPoints()
    {
        $result = $this->transport->getResult($this->service, array(
            'waypoints' => $this->wayPoints
        ));

        $this->assertNotEmpty($result['waypoints']);
    }

    /*
     * @brief check items on instance of CalculateDirection
     */
    protected function checkDirectionItems($directions)
    {
        foreach ($directions as $direction) {
            $this->assertTrue($direction instanceof CalculateDirection);
        }
    }
}



