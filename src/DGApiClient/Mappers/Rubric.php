<?php

namespace DGApiClient\Mappers;

/**
 * Class Rubric
 * @package DGApiClient\Mappers
 */
class Rubric extends AbstractMapper
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $alias;

    /**
     * @var int
     */
    public $parentId;

    /**
     * @var int
     */
    public $orgCount = 0;

    /**
     * @var int
     */
    public $branchCount = 0;

    /**
     * @var string
     */
    public $kind;

    const RUBRIC_GENERAL = 'general_rubric';
    const RUBRIC_SUB = 'rubric';

    const KIND_PRIMARY = 'primary';
    const KIND_ADDITIONAL = 'additional';
}
