<?php

use \DGApiClient\ApiConnection;

class AbstractDomainTestCase extends \PHPUnit_Framework_TestCase {

    /* @var ApiConnection */
    public $client;

    public function setUp()
    {
        $this->client = new ApiConnection(API_KEY);
        $this->client->raiseException = false;
    }

    public function tearDown()
    {
        unset($this->client);
    }

} 