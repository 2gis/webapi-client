PHP библиотека к API 2Гис
============================

[![Build Status](https://secure.travis-ci.org/2gis/webapi-client.png?branch=master)](https://travis-ci.org/2gis/webapi-client)
[![Latest Stable Version](https://poser.pugx.org/2gis/api-client/v/stable.png)](https://packagist.org/packages/2gis/api-client)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/2gis/webapi-client/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/2gis/webapi-client/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/2gis/webapi-client/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/2gis/webapi-client/?branch=master)
[![License](https://poser.pugx.org/2gis/api-client/license.svg)](https://packagist.org/packages/2gis/api-client)

## Установка

### composer

Установка с использованием менеджера пакетов [Composer](http://getcomposer.org):

```bash
$ curl -s https://getcomposer.org/installer | php
```

Теперь вносим изменения в ваш `composer.json`:

```yaml
{
    "require": {
        "2gis/api-client": "dev-master"
    }
}
```

## Использование

* [API регионов](http://api.2gis.ru/doc/2.0/region/quickstart)
* [API справочника](http://api.2gis.ru/doc/2.0/catalog/quickstart)
* [API транспорта](http://api.2gis.ru/doc/2.0/transport/route/search)
* [API геоданных](http://api.2gis.ru/doc/2.0/geo/method/search-query/query)

## Лицензия

Пакет `2gis/api-client` распространяется под лицензией MIT (текст лицензии вы найдёте в файле
[LICENSE](https://raw.github.com/2gis/api-client/master/LICENSE)), данная лицензия
распространяется на код данной библиотеки и только на неё, использование сервисов 2Гис регулируются
документами, которые вы сможете найти на странице [Правовая информация по API 2ГИС](http://help.2gis.ru/api-rules/)
