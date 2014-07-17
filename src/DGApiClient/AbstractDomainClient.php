<?php

namespace DGApiClient;

use \DGApiClient\Exceptions\Exception;
use \DGApiClient\Mappers\MapperFactory;
use \DGApiClient\Mappers\MapperInterface;

abstract class AbstractDomainClient
{

    /* @var ApiConnection */
    protected $client;

    protected $factory;

    /**
     * @param ApiConnection $client
     * @param MapperFactory $mapper
     * @internal param array $classMap
     */
    public function __construct(ApiConnection $client, MapperFactory $mapper = null)
    {
        $this->client = $client;
        $this->factory = $mapper ? $mapper : new MapperFactory();
    }

    /**
     * @param string $service
     * @param array $params
     * @param string $mapper
     * @return mixed|MapperInterface
     */
    protected function getSingle($service, $mapper, array $params = array())
    {
        $response = $this->client->send($service, $params);
        if (isset($response['items'][0])) {
            return $this->factory->map($response['items'][0], $mapper);
        }
        return false;
    }

    /**
     * @param string $service
     * @param string $mapper
     * @param array $params
     * @param string $typeItems
     * @throws Exceptions\Exception
     * @return array|MapperInterface[]
     */
    protected function getInternalList($service, $mapper, array $params = array(), $typeItems = 'items')
    {
        $response = $this->client->send($service, $params);
        if (is_string($response)) {
            throw new Exception("Can't get items for string response");
        }
        return $this->getItemsOfResponse($response, $mapper, $typeItems);
    }

    /**
     * @param array $response
     * @param string $mapper
     * @param string $items
     * @throws Exceptions\Exception
     * @return array|MapperInterface[]
     */
    protected function getItemsOfResponse($response, $mapper, $items)
    {
        if (empty($response[$items])) {
            return array();
        }

        $result = array();
        foreach ($response[$items] as $value) {
            $result[] = $this->factory->map($value, $mapper);
        }
        return $result;
    }

    /**
     * @param array $values
     * @return null|string
     */
    public static function getArray(array $values)
    {
        return empty($values) ? null : implode(',', $values);
    }
}
