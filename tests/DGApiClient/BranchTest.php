<?php

use \DGApiClient\Mappers;

class BranchTest extends AbstractDomainTestCase {

    public function testGetBranch()
    {
        $branch = $this->catalog->getBranch(141265770608749);
        $this->assertTrue($branch instanceof Mappers\Branch);
    }

}