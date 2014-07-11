<?php

use \DGApiClient\Mappers;
use \DGApiClient\Catalog;
use \DGApiClient\SearchCriteria;


class BranchTest extends AbstractDomainTestCase {

    /* @var Catalog */
    public $catalog;

    public function setUp()
    {
        parent::setUp();
        $this->catalog = new Catalog($this->client);
    }

    public function tearDown()
    {
        parent::tearDown();
        unset($this->catalog);
    }

    public function testGetBranch()
    {
        $branch = $this->catalog->getBranch(141265770608749);
        $this->assertTrue($branch instanceof Mappers\Branch);
    }

    public function testSearchNoFound()
    {
        $result = $this->catalog->branchSearch('asdfasdfowqierupqowierupo', array(
            'region_id' => 1
        ));
        $this->assertEmpty($result);
    }

    public function testBranchesInBuilding()
    {
        $result = $this->catalog->branchList(
            SearchCriteria\BranchBuildingListCriteria::required(141373143520624)
        );
        $this->assertNotEmpty($result);
        foreach ($result as $value) {
            $this->assertTrue($value instanceof Mappers\Branch, 'Each value must be Mappers\Region');
        }

    }

    public function testServiceBranchesInBuilding()
    {
        $result = $this->catalog->branchList(
            new SearchCriteria\BranchBuildingListCriteria(array('building_id' => 141373143520624, 'services' => true))
        );
        $this->assertNotEmpty($result);
        foreach ($result as $value) {
            $this->assertTrue($value instanceof Mappers\Branch, 'Each value must be Mappers\Region');
        }

    }
}