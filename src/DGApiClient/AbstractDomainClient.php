<?php

namespace DGApiClient;

use \DGApiClient\Mappers\Mapper;

abstract class AbstractDomainClient
{

    /* @var ApiConnection */
    protected $client;

    /**
     * @param ApiConnection $client
     */
    public function __construct(ApiConnection $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $service
     * @param array $params
     * @param string $mapperClass
     * @return mixed|Mapper
     */
    public function getSingle($service, $mapperClass, array $params = array())
    {
        $response = $this->client->send($service, $params);
        if (isset($response['items'][0])) {
            return Mapper::factory($response['items'][0], $mapperClass);
        }
        return false;
    }
}
