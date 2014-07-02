<?php

use \DGApiClient\ApiConnection;
use \DGApiClient\Catalog;

class AbstractDomainTestCase extends \PHPUnit_Framework_TestCase {

    /* @var ApiConnection */
    public $client;

    /* @var Catalog */
    public $catalog;

    public function setUp()
    {
        $this->client = new ApiConnection(API_KEY);
        $this->client->raiseException = false;
        $this->catalog = new Catalog($this->client);
    }

    public function tearDown()
    {
        unset($this->catalog);
        unset($this->client);
    }

} 