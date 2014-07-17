<?php

namespace DGApiClient\Mappers;

class Region extends AbstractMapper
{
    /* @var int */
    public $id;

    /* @var string */
    public $name;

    public $nameGrammaticalCases;

    /* @var string */
    public $domain;

    /* @var string */
    public $language;

    public $availableLanguages;

    /* @var string */
    public $locale;

    public $locales;

    public $timeZone;

    /* @var string */
    public $bounds;

    public $statistics;
}
