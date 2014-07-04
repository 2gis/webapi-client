<?php

use \DGApiClient\Mappers\CalculateDirection;

class CalculateDirectionTest extends AbstractDomainTestCase {

    /* @var string */
    private $waypoints = '82.838287 54.96579,82.838287 54.86579';

    /* @var string */
    private $waypointsWithSpaces = '82.838287   54.96579,    82.838287   54.86579';

    /* @var string*/
    private $service =  'transport/calculate_directions';

    public function testGetCalculateDirectionList()
    {
        $directions = $this->catalog->getCalculateDirectionList($this->waypoints);
        $this->checkList($directions, '\DGApiClient\Mappers\CalculateDirection', 'getCalculateDirectionList');
    }

    public function testGetCalculateDirectionsWithSpaces()
    {
        $directions = $this->catalog->getCalculateDirectionList($this->waypointsWithSpaces);
        $this->checkList($directions, '\DGApiClient\Mappers\CalculateDirection', 'getCalculateDirectionList');
    }

    public function testGetCalculateDirectionsWaipoints()
    {
        $result = $this->catalog->getResult($this->service, array(
            'waypoints' => $this->waypoints
        ));

        $this->assertTrue((!empty($result['waypoints'])));
    }

    /*
     * @brief check items on instanseof CalculateDirection
     */
    protected function checkDirectionItems($directions)
    {
        foreach ($directions as $direction) {
            $this->assertTrue($direction instanceof CalculateDirection);
        }
    }
}



