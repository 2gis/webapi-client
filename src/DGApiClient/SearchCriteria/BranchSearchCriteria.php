<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class BranchSearchCriteria
 * @property int $rubric_id
 * @property int $region_id
 * @property string $sort
 * @property string $sort_point
 * @package DGApiClient\SearchCriteria
 */
class BranchSearchCriteria extends AbstractSearchCriteria
{

    const SORT_RELEVANCE = 'relevance';
    const SORT_DISTANCE = 'distance';
    const SORT_RATING = 'rating';
    const SORT_CREATION_TIME = 'creation_time';
    const SORT_POPULARITY = 'popularity';
    const SORT_BOUND = 'bound';

    protected $attributeValidators = array(
        'rubric_id',
        'region_id',
        'sort',
        'sort_point',
        'point1',
        'point2',

        'work_time',
        'has_reviews',
        'has_photos',
        'has_site',
        'has_ads',
        'has_rating',
        'city_id',
        'district_id',
        'building_id',
    );
}
