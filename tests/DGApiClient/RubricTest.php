<?php

use \DGApiClient\mappers;

class RubricTest extends AbstractDomainTestCase {

    /**
     * @return mappers\GeneralRubric|mappers\Rubric
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
            $this->assertTrue($value instanceof mappers\GeneralRubric, 'Each value must be GeneralRubric');
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
            $this->assertTrue($value instanceof mappers\Rubric, 'Each value must be GeneralRubric');
        }
    }

    public function testRubricListBadParentId()
    {
        $this->assertEmpty(
            $this->catalog->getRubricList(1, PHP_INT_MAX)
        );
    }

    public function testRubricListBadRegionId()
    {
        $this->assertEmpty(
            $this->catalog->getRubricList(PHP_INT_MAX)
        );
    }

}