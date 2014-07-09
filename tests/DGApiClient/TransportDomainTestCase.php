<?php

use \DGApiClient\Transport;

class TransportDomainTestCase extends AbstractDomainTestCase {

    /* @var Transport */
    public $transport;

    public function setUp()
    {
        parent::setUp();
        $this->transport = new Transport($this->client);
    }

    public function tearDown()
    {
        unset($this->transport);
        parent::tearDown();
    }

}