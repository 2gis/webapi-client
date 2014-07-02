#!/bin/sh

mkdir .reports

# Code style
php vendor/bin/phpcs ./src/DGApiClient --standard=PSR1 --encoding=utf-8 --report=emacs
php vendor/bin/phpcs ./src/DGApiClient --standard=PSR2 --encoding=utf-8 --report=emacs

# PHPUnit tests
php vendor/bin/phpunit --configuration tests/phpunit.xml.dist --coverage-clover=.reports/clover.xml
