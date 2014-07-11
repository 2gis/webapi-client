<?php

namespace DGApiClient\SearchCriteria;

/**
 * Class RegionSearchCriteria
 * @property string $lang
 * @property string|string[] $locale_filter
 * @property string|string[] $country_code_filter
 * @package DGApiClient\SearchCriteria
 */
class RegionSearchCriteria extends AbstractSearchCriteria
{

    protected $allowedAttributes = array(
        'lang',
        'locale_filter',
        'country_code_filter',
    );
}
