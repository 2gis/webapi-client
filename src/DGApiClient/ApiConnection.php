<?php

namespace DGApiClient;

use DGApiClient\Exceptions\ConnectionException;

/**
 * Class ApiConnection
 * @package DGApiClient
 */
class ApiConnection
{

    //@todo: PSR-3 logger

    /* @var string $key API access key */
    public $key;

    /* @var string $url url to 2Gis API */
    public $url = 'http://catalog.api.2gis.ru';

    /* @var string $version api version */
    public $version = '2.0';

    /* @var string $format */
    protected $format = 'json';

    /* @var string $locale */
    public $locale = 'ru_RU';

    /* @var int $timeout in milliseconds */
    public $timeout = 5000;

    /* @var resource $curl */
    protected $curl;

    /* @var bool $raiseException */
    public $raiseException = true;

    /**
     * @param string $key
     */
    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @param string $value
     * @return string
     * @throws ConnectionException
     */
    public function setFormat($value)
    {
        $value = strtolower($value);
        if (in_array($value, array('json', 'jsonp', 'xml'))) {
            return $this->format = $value;
        } else {
            throw new ConnectionException("Unknown format $value");
        }
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $service
     * @param array $params
     * @return array|string
     * @throws ConnectionException
     */
    public function send($service, array $params = array())
    {
        $curl = $this->getCurl();
        curl_setopt(
            $this->curl,
            CURLOPT_URL,
            $this->getRequest($service, $params)
        );
        $data = curl_exec($curl);
        if (curl_errno($curl)) {
            return $this->raiseException(curl_error($curl), curl_errno($curl), null, 'CURL');
        }
        $response = $this->decodeResponse($data);
        if ($this->getFormat() === 'xml') {
            return $data;
        }
        if (isset($response['meta']['error'])) {
            return $this->metaException($response['meta']);
        }
        if (!$response || !isset($response['meta'], $response['result'])) {
            return $this->raiseException("Invalid response message");
        }
        return $response['result'];
    }

    /**
     * @param string $service
     * @param array $params
     * @return string
     */
    public function getRequest($service, array $params = array())
    {
        $params = array_filter(array_merge(array('key' => $this->key, 'locale' => $this->locale), $params));
        $url = $this->url . '/' . $this->version . '/' . $service . '?' . http_build_query($params);
        return $url;
    }

    /**
     * @param string $data
     * @return mixed
     */
    private function decodeResponse($data)
    {
        switch ($this->format) {
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'jsonp':
                $data = preg_replace("/ ^[?\w(]+ | [)]+\s*$ /x", "", $data); //JSONP -> JSON
            case 'json':
                return @json_decode($data, true);
        }
        return $data;
    }

    /**
     * @return resource
     */
    private function getCurl()
    {
        if ($this->curl === null) {
            $this->curl = curl_init();
            curl_setopt_array($this->curl, array(
                CURLOPT_TIMEOUT_MS => $this->timeout,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_FOLLOWLOCATION => false,
                CURLOPT_USERAGENT => 'PHP ' . __CLASS__,
                CURLOPT_ENCODING => 'gzip, deflate',
            ));
        }
        return $this->curl;
    }

    public function __destruct()
    {
        if ($this->curl !== null) {
            unset($this->curl);
        }
    }

    /**
     * @param string $message
     * @param int $code
     * @param \Exception $previous
     * @param string $type
     * @return bool
     * @throws ConnectionException
     */
    protected function raiseException($message = "", $code = 0, \Exception $previous = null, $type = "")
    {
        if ($this->raiseException) {
            throw new ConnectionException($message, $code, $previous, $type);
        }
        return false;
    }

    /**
     * @param array $meta
     * @param string $defaultMessage
     * @return bool
     * @throws ConnectionException
     */
    protected function metaException(array $meta, $defaultMessage = "")
    {
        if ($this->raiseException) {
            throw new ConnectionException(
                isset($meta['error']['message']) ? $meta['error']['message'] : $defaultMessage,
                $meta['code'],
                null,
                isset($meta['error']['type']) ? $meta['error']['type'] : ""
            );
        }
        return false;
    }
}
