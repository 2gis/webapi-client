<?php

use \DGApiClient\ApiConnection;

class ApiConnectionTest extends \PHPUnit_Framework_TestCase {

    /* @var ApiConnection */
    public $client;

    public function setUp()
    {
        $this->client = new ApiConnection(API_KEY);
    }

    public function tearDown()
    {
        unset($this->client);
    }

    /**
     * @expectedException DGApiClient\exceptions\ConnectionException
     * @expectedExceptionCode 403
     * @expectedExceptionMessage invalid key
     */
    public function testWrongApiKey()
    {
        $client = new ApiConnection(PHP_INT_MAX);
        $client->send('region/list');
    }

    /**
     * @expectedException DGApiClient\exceptions\ConnectionException
     * @expectedExceptionCode 400
     * @expectedExceptionMessage Method not found
     */
    public function testWrongApiMethod()
    {
        $this->markTestSkipped('This test has been skipped due WAPI-11077');
        $this->client->send('some/strange');
    }

    /**
     * @expectedException DGApiClient\exceptions\ConnectionException
     * @expectedExceptionMessage Invalid response message
     */
    public function testIncorrectAnswer()
    {
        $this->client->url = 'http://example.com';
        $this->client->send('some');
    }

    /**
     * @expectedException DGApiClient\exceptions\ConnectionException
     */
    public function testCurlError()
    {
        $this->client->url = 'Such strange';
        $this->client->send('wow');
    }

    public static function providerCorrectFormats()
    {
        return array(
            array('json'),
            array('jsonp'),
            array('xml'),
            array('Json'),
        );
    }

    public function testJsonp()
    {
        $this->client->setFormat('jsonp');
        $this->assertArrayHasKey('items', $this->client->send('region/list'));
    }

    public function testXml()
    {
        $this->client->setFormat('xml');
        $this->assertTrue(is_string($this->client->send('region/list')));
    }

    /**
     * @dataProvider providerCorrectFormats
     * @param $format
     */
    public function testCorrectFormat($format)
    {
        $this->assertEquals(strtolower($format), $this->client->setFormat($format));
        $this->assertEquals(strtolower($format), $this->client->getFormat());
    }

    /**
     * @expectedException DGApiClient\exceptions\ConnectionException
     */
    public function testIncorrectFormat()
    {
        $this->client->setFormat('WRONG');
    }

}