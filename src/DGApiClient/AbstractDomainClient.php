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
    protected function getSingle($service, $mapperClass, array $params = array())
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
     * @param string $typeItems
     * @return array |Mapper
     */
    protected function getInternalList($service, $mapperClass, array $params = array(), $typeItems = 'items')
    {
        $response = $this->client->send($service, $params);
        return $this->getItemsOfResponse($response, $mapperClass, $typeItems);
    }

    /**
     * @param array $response
     * @param string $mapperClass
     * @param string $items
     * @throws Exceptions\Exception
     * @return array|Mapper[]
     */
    protected function getItemsOfResponse($response, $mapperClass, $items)
    {
        if (empty($response[$items])) {
            return array();
        }

        $result = array();
        foreach ($response[$items] as $value) {
            /* @var Mapper $mapper */
            $mapper = new $mapperClass();
            $result[] = $mapper->populate($value);
        }
        return $result;
    }

    public static function getArray(array $values)
    {
        return empty($values) ? null : implode(',', $values);
    }
}
