<?php

error_reporting(E_ALL | E_NOTICE);

if (function_exists('date_default_timezone_set') && function_exists('date_default_timezone_get')) {
    date_default_timezone_set(@date_default_timezone_get());
}

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/DGApiClient/AbstractDomainTestCase.php';
require __DIR__ . '/DGApiClient/TransportDomainTestCase.php';
$config = require __DIR__ . '/config.php';
defined('API_KEY') or define('API_KEY', $config['autotestKey']);