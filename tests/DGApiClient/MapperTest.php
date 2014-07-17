<?php

use \DGApiClient\Mappers\Mapper;

class MapperTest extends \PHPUnit_Framework_TestCase {

    /**
     * @expectedException DGApiClient\Exceptions\Exception
     */
    public function testInstantiateUnexpectedClass()
    {
        $object = new \DGApiClient\Mappers\MapperFactory();
        $object->map(array(), 'stdObject');
    }
} 