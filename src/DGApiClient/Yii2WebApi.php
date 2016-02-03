<?php

namespace DGApiClient;

use \yii\base\Component;
use \DGApiClient\Mappers\MapperFactory;

/**
 * Class Yii2WebApi
 *
 * Usage:
 *  - Put folder in extensions/DGApiClient
 *  - Update main.php config:
 *  'components' => array(
 *      'api2' => array(
 *          'class'  => 'DGApiClient.Yii2WebApi',
 *          'key' => <Your API key>,
 *      ),
 *      ...
 *  ),
 *
 * Example:
 * Yii::app()->api2->catalog->getRubricList();
 *
 * @package WebApi
 * @property string $url
 * @property \DGApiClient\Catalog $catalog
 * @property \DGApiClient\Region $region
 * @property \DGApiClient\Transport $transport
 * @property \DGApiClient\Geo $geo
 * @property string[] $classMap
 */
class Yii2WebApi extends Component
{

    /**
     * @var string
     */
    public $key;

    /**
     * @var string PSR-3 complaint logger
     */
    public $logger;

    /**
     * @var string[]
     */
    protected $classMap = [];

    /**
     * @var ApiConnection
     */
    protected $connection;

    /**
     * @var \DGApiClient\AbstractDomainClient[]
     */
    protected $domains;

    /**
     * @var string
     */
    private $url = 'http://catalog.api.2gis.ru/';

    /**
     * @var MapperFactory
     */
    protected $factory;

    public function init()
    {
        parent::init();

        $this->connection = new ApiConnection(
            $this->key,
            $this->logger ? \Yii::$app->{$this->logger} : null
        );
        if (!empty($this->url)) {
            $this->connection->url = $this->url;
        }
        $this->factory = new MapperFactory($this->classMap);
    }

    public function setUrl($value)
    {
        return $this->connection ? $this->connection->url = $value : $this->url = $value;
    }

    public function setClassMap($values = array())
    {
        $this->classMap = $values;
        if ($this->factory) {
            $this->factory->setClassMap($values);
        }
    }

    /**
     * @return \string[]
     */
    public function getClassMap()
    {
        return $this->classMap;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->connection ? $this->connection->url : $this->url;
    }

    /**
     * @return Catalog
     */
    public function getCatalog()
    {
        return $this->getApiDomain('catalog');
    }

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->getApiDomain('region');
    }

    /**
     * @return Transport
     */
    public function getTransport()
    {
        return $this->getApiDomain('transport');
    }

    /**
     * @return Geo
     */
    public function getGeo()
    {
        return $this->getApiDomain('geo');
    }

    /**
     * @param string $name
     * @return \DGApiClient\AbstractDomainClient
     */
    protected function getApiDomain($name)
    {
        $className = ucfirst($name);
        if (!$this->domains[$name]) {
            $classFullName = 'DGApiClient\\' . $className;
            return $this->domains[$name] = new $classFullName($this->connection, $this->factory);
        }
        return $this->domains[$name];
    }
}
