<?php

use \DGApiClient\Region;
use \DGApiClient\Mappers\Region as RegionMapper;

class RegionTest extends AbstractDomainTestCase {

    /* @var Region */
    public $region;

    public function setUp()
    {
        parent::setUp();
        $this->region = new Region($this->client);
    }

    public function tearDown()
    {
        parent::tearDown();
        unset($this->region);
    }

    public function testRegionList()
    {
        $result = $this->region->getList();
        $this->assertTrue(is_array($result), 'getList must return array');
        foreach ($result as $value) {
            $this->assertTrue($value instanceof RegionMapper, 'Each value must be Mappers\Region');
        }
    }

    public function testRegionListByIds()
    {
        $result = $this->region->getListByIds(array(1, 5));
        $this->assertTrue(is_array($result), 'getListByIds must return array');
        $this->assertEquals(2, count($result));
        foreach ($result as $value) {
            $this->assertTrue($value instanceof RegionMapper, 'Each value must be Mappers\Region');
        }
    }

    public function testGetByBranch()
    {
        $result = $this->region->getByBranch(141265770608749);
        $this->assertTrue($result instanceof RegionMapper, 'Returned value must be instance of Mapper\Region');
    }

    public function testGetByUnExistedBranch()
    {
        $result = $this->region->getByBranch(PHP_INT_MAX);
        $this->assertFalse($result);
    }

    public function testGet()
    {
        $result = $this->region->get(1);
        $this->assertTrue($result instanceof RegionMapper, 'Returned value must be instance of Mapper\Region');
    }

    public function search()
    {
        $result = $this->region->search('Ново');
        $this->assertTrue(is_array($result), 'getList must return array');
        foreach ($result as $value) {
            $this->assertTrue($value instanceof RegionMapper, 'Each value must be Mappers\Region');
        }
    }
}
