<?php

namespace DGApiClient\mappers;

class GeneralRubric extends Mapper
{

    const GENERAL_RUBRIC = 'general_rubric';
    const RUBRIC = 'rubric';

    /* @var int $id */
    public $id;

    /* @var string $name */
    public $name;

    /* @var string $alias */
    public $alias;

    /* @var int $parentId */
    public $parentId;

    /* @var int $orgCount */
    public $orgCount;

    /* @var int $branchCount */
    public $branchCount;

    public static function factory($data, $className = __CLASS__)
    {
        if (isset($data['type']) && $data['type'] == self::GENERAL_RUBRIC) {
            return parent::factory($data, '\\' . __NAMESPACE__ . '\GeneralRubric');
        } else {
            return parent::factory($data, '\\' . __NAMESPACE__ . '\Rubric');
        }
    }
}
