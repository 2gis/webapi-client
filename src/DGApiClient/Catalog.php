<?php

namespace DGApiClient;

use DGApiClient\Mappers\GeneralRubric;
use DGApiClient\Mappers\Rubric;

class Catalog extends AbstractDomainClient
{

    const SORT_NAME = 'name';
    const SORT_POPULARITY = 'popularity';

    /**
     * Поиск рубрик
     * @param int $regionId
     * @param int $parentId
     * @param string $sort
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/list
     * @return GeneralRubric[]|Rubric[]
     */
    public function getRubricList($regionId, $parentId = 0, $sort = self::SORT_NAME)
    {
        $response = $this->client->send('catalog/rubric/list', array(
            'region_id' => (int)$regionId,
            'parent_id' => (int)$parentId,
            'sort'      => $sort,
        ));

        if (!isset($response['items'])) {
            return array();
        }

        $result = array();
        foreach ($response['items'] as $value) {
            $result[] = GeneralRubric::factory($value);
        }
        return $result;
    }

    /**
     * Получение рубрики
     * @param int $id
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/get
     * @return GeneralRubric|Rubric|bool
     */
    public function getRubric($id)
    {
        return $this->getSingle(
            'catalog/rubric/get',
            __NAMESPACE__ . '\Mappers\GeneralRubric',
            array('id' => (int)$id)
        );
    }

    /**
     * Получение рубрики по псевдониму
     * @param string $alias
     * @param int $regionId
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/get-by-alias
     * @return GeneralRubric|Rubric|bool
     */
    public function getRubricByAlias($alias, $regionId)
    {
        return $this->getSingle(
            'catalog/rubric/get',
            __NAMESPACE__ . '\Mappers\GeneralRubric',
            array('alias' => $alias, 'region_id' => (int)$regionId)
        );
    }

    /**
     * Получение профиля филиала организации
     * @param int $id
     * @param array $additionalFields
     * @link http://api.2gis.ru/doc/2.0/catalog/profile/profile
     * @return mappers\Branch|bool
     */
    public function getBranch($id, array $additionalFields = array())
    {
        return $this->getSingle(
            'catalog/branch/get',
            __NAMESPACE__ . '\Mappers\Branch',
            array('id' => (int)$id, 'fields' => ApiConnection::getArray($additionalFields))
        );
    }
}
