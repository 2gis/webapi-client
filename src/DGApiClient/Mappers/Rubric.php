<?php

namespace DGApiClient\Mappers;

/**
 * Class Rubric
 * @package DGApiClient\Mappers
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string $alias
 * @property int $parentId
 * @property int $orgCount
 * @property int $branchCount
 * @property string $kind
 */
class Rubric extends AbstractMapper
{

    const RUBRIC_GENERAL = 'general_rubric';
    const RUBRIC_SUB = 'rubric';

    const KIND_PRIMARY = 'primary';
    const KIND_ADDITIONAL = 'additional';
}
