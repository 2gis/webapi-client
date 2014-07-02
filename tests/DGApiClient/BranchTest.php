<?php

use \DGApiClient\mappers;

class BranchTest extends AbstractDomainTestCase {

    public function testGetBranch()
    {
        $branch = $this->catalog->getBranch(141265769361176);
        $this->assertTrue($branch instanceof mappers\Branch);
    }

}