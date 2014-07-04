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

    /**
     * @param string $service
     * @param array $params
     * @param string $mapperClass
     * @return array|Mapper
     */
    public function getList($service, $mapperClass, array $params = array(), $typeItems = 'items')
    {
        $response = $this->client->send($service, $params);
        return $this->getItemsOfResponse($response, $mapperClass, $typeItems);
    }

    /**
     * @param string $service
     * @param array $params
     * @return array
     */
    public function getResult($service, array $params = array())
    {
        $response = $this->client->send($service, $params);
        if (empty($response) || !is_array($response)) {
            return array();
        }
        return $response;
    }

    /**
     * @param mixed $result
     * @param string $items
     * @return array|Mapper[]
     */
    protected function getItemsOfResponse($response, $mapperClass, $items)
    {
        if (empty($response[$items])) {
            return array();
        }

        $result = array();
        foreach ($response[$items] as $value) {
            $result[] = Mapper::factory($value, $mapperClass);
        }
        return $result;
    }
}
