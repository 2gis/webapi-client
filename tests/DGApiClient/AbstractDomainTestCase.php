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

    public function checkList($values, $mapperClass, $methodName)
    {
        $this->assertTrue(is_array($values), "{$methodName} must return array");

        foreach ($values as $value) {
            $this->assertTrue($value instanceof $mapperClass, 'Each value must be Route');
        }
    }

} 