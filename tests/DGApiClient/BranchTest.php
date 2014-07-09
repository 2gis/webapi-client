<?php

use \DGApiClient\Mappers;
use \DGApiClient\Catalog;


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

}