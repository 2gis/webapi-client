<?php

namespace DGApiClient\Mappers;

class Rubric extends AbstractMapper
{

    const GENERAL_RUBRIC = 'general_rubric';
    const SUB_RUBRIC = 'rubric';

    const KIND_PRIMARY = 'primary';
    const KIND_ADDITIONAL = 'additional';

    /* @var int $id */
    public $id;

    /* @var string $name */
    public $name;

    /* @var string $type */
    public $type;

    /* @var string $alias */
    public $alias;

    /* @var int $parentId */
    public $parentId;

    /* @var int $orgCount */
    public $orgCount;

    /* @var int $branchCount */
    public $branchCount;

    /* @var string $kind */
    public $kind;

    /* @var Rubric[] $rubrics */
    public $rubrics = array();

    public function setRubrics($values)
    {
        $this->rubrics = array();
        foreach ($values as $rubric) {
            $this->rubrics[] = $this->factory->map($rubric, 'Rubric');
        }
    }
}
