<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class RegionSearchCriteria
 * @package DGApiClient\SearchCriteria
 * @property string $lang
 * @property string|string[] $locale_filter
 * @property string|string[] $country_code_filter
 */
class RegionSearchCriteria extends AbstractSearchCriteria
{

    protected $allowedAttributes = array(
        'lang',
        'locale_filter',
        'country_code_filter',
    );
}
