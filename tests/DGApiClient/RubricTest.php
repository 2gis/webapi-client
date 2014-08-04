<?php

use \DGApiClient\Mappers\Rubric;
use \DGApiClient\Catalog;

class RubricTest extends AbstractDomainTestCase {

    /* @var Catalog */
    public $catalog;

    public function setUp()
    {
        parent::setUp();
        $this->catalog = new Catalog($this->client);
    }

    public function tearDown()
    {
        parent::tearDown();
        unset($this->catalog);
    }

    /**
     * @return Rubric
     */
    private function getRandomGeneralRubric()
    {
        static $rubric;
        if ($rubric === null) {
            $generalRubrics =  $this->catalog->getRubricList(1);
            $rubric = $generalRubrics[0];
        }
        return $rubric;
    }

    public function testGeneralRubricList()
    {
        $result = $this->catalog->getRubricList(1);
        $this->assertTrue(is_array($result), 'getRubricList must return array');
        foreach ($result as $value) {
            $this->assertTrue($value instanceof Rubric, 'Each value must be instance of Rubric');
            $this->assertEquals(Rubric::RUBRIC_GENERAL, $value->type);
        }
    }

    /**
     * @depends testGeneralRubricList
     */
    public function testSubRubricList()
    {
        $result = $this->catalog->getRubricList(1, $this->getRandomGeneralRubric()->id);
        $this->assertTrue(is_array($result), 'getRubricList must return array');
        foreach ($result as $value) {
            $this->assertTrue($value instanceof Rubric, 'Each value must be instance of Rubric');
            $this->assertEquals(Rubric::RUBRIC_SUB, $value->type);
        }
    }

    public function testRubricListBadParentId()
    {
        $this->assertEmpty(
            $this->catalog->getRubricList(1, PHP_INT_MAX)
        );
    }

    public function testGetRubric()
    {
        $result = $this->catalog->getRubric($this->getRandomGeneralRubric()->id);
        $this->assertTrue($result instanceof Rubric);
    }

    public function testGetRubricByAlias()
    {
        $name = 'avtozapchasti_dlya_inomarok';
        $result = $this->catalog->getRubricByAlias($name, 1);
        $this->assertTrue($result instanceof Rubric);
    }

    public function testRubricListBadRegionId()
    {
        $this->assertEmpty(
            $this->catalog->getRubricList(PHP_INT_MAX)
        );
    }

}