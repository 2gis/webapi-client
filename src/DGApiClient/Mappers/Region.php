<?php

namespace DGApiClient\Mappers;

/**
 * Class Region
 * @package DGApiClient\Mappers
 */
class Region extends AbstractMapper
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
     * @var string[]
     */
    public $nameGrammaticalCases = array();

    /**
     * @var string
     */
    public $domain;

    /**
     * @var string
     */
    public $language;

    /**
     * @var string[]
     */
    public $availableLanguages = array();

    /**
     * @var string
     */
    public $locale;

    /**
     * @var string[]
     */
    public $locales = array();

    /**
     * @var mixed
     */
    public $timeZone;

    /**
     * @var string
     */
    public $bounds;

    /**
     * @var array
     */
    public $statistics = array();
}
