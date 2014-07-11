<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class BranchSearchCriteria
 * @property int $work_time
 * @property string $sort
 * @property bool $has_reviews
 * @property bool $has_photos
 * @property bool $has_site
 * @property bool $has_ads
 * @property bool $has_rating
 * @property int|int[] $rubric_id
 * @property int|int[] $city_id
 * @property int|int[] $district_id
 * @property int|int[] $building_id
 * @package DGApiClient\SearchCriteria
 */
class BranchSearchCriteria extends AbstractSearchCriteria
{

    const SORT_RELEVANCE = 'relevance';
    const SORT_DISTANCE = 'distance';
    const SORT_RATING = 'rating';
    const SORT_CREATION_TIME = 'creation_time';
    const SORT_POPULARITY = 'popularity';

    // @todo add branch additional attributes http://api.2gis.ru/doc/2.0/catalog/branch/attributes
    protected $allowedAttributes = array(
        'work_time',
        'sort',
        'has_reviews',
        'has_photos',
        'has_site',
        'has_ads',
        'has_rating',
        'rubric_id',
        'city_id',
        'district_id',
        'building_id',
    );
}
