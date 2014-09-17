<?php

namespace DGApiClient;

use DGApiClient\SearchCriteria\BranchSearchCriteria;
use DGApiClient\Mappers\Rubric;

/**
 * Class Catalog
 * @package DGApiClient
 */
class Catalog extends AbstractDomainClient
{

    const SORT_NAME = 'name';
    const SORT_POPULARITY = 'popularity';

    public static $scopes = array(
        'none' => array(),
        'full' => array(
            'items.region_id', 'items.name_ex', 'items.alias', 'items.point',
            'items.adm_div', 'items.org', 'items.dates', 'items.photos',
            'items.see_also', 'items.external_profiles', 'items.flags',
            'items.links', 'items.external_content', 'items.booklet',
            'items.plus_one', 'items.locale'
        ),
    );

    /**
     * Получить иерархию рубрик проекта
     * @param int $regionId
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/list
     * @return Rubric[]
     */
    public function getAllRubrics($regionId)
    {
        return $this->getRubricList($regionId, 0, self::SORT_NAME, array('items.rubrics'));
    }

    /**
     * Поиск рубрик
     * @param int $regionId
     * @param int $parentId
     * @param string $sort
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/list
     * @return Rubric[]
     */
    public function getRubricList($regionId, $parentId = 0, $sort = self::SORT_NAME, array $additionalFields = array())
    {
        return $this->getInternalList(
            'catalog/rubric/list',
            'Rubric',
            array(
                'region_id' => (int)$regionId,
                'parent_id' => (int)$parentId,
                'sort' => $sort,
                'fields' => self::getArray($additionalFields),
            )
        );
    }

    /**
     * Получение рубрики
     * @param int $id
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/get
     * @return Rubric|bool
     */
    public function getRubric($id, array $additionalFields = array())
    {
        return $this->getSingle(
            'catalog/rubric/get',
            'Rubric',
            array('id' => (int)$id, 'fields' => self::getArray($additionalFields))
        );
    }

    /**
     * Получение списка рубрик
     * @param int[] $ids
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/get
     * @return Rubric|bool
     */
    public function getRubrics(array $ids, array $additionalFields = array())
    {
        return $this->getInternalList(
            'catalog/rubric/get',
            'Rubric',
            array('id' => self::getArray($ids), 'fields' => self::getArray($additionalFields))
        );
    }

    /**
     * Получение рубрики по псевдониму
     * @param string $alias
     * @param int $regionId
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/get-by-alias
     * @return Rubric|bool
     */
    public function getRubricByAlias($alias, $regionId, array $additionalFields = array())
    {
        return $this->getSingle(
            'catalog/rubric/get',
            'Rubric',
            array('alias' => $alias, 'region_id' => (int)$regionId, 'fields' => self::getArray($additionalFields))
        );
    }

    /**
     * Получение профиля филиала организации
     * @param int $id
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/catalog/profile/profile
     * @return mappers\Branch|bool
     */
    public function getBranch($id, array $additionalFields = array())
    {
        return $this->getSingle(
            'catalog/branch/get',
            'Branch',
            array('id' => (int)$id, 'fields' => self::getArray($additionalFields))
        );
    }

    /**
     * Поиск филиалов организаций
     * @param BranchSearchCriteria|string[] $criteria
     * @param int $page
     * @param int $pageSize
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/catalog/branch/list-by-rubric
     * @return mappers\Branch[]|array()
     */
    public function branchList(
        $criteria = array(),
        $page = null,
        $pageSize = null,
        array $additionalFields = array()
    ) {
        return $this->getInternalList(
            'catalog/branch/list',
            'Branch',
            array_merge(
                $criteria instanceof BranchSearchCriteria ? $criteria->toArray() : $criteria,
                array(
                    'page' => $page,
                    'page_size' => $pageSize,
                    'fields' => self::getArray($additionalFields),
                )
            )
        );
    }

    /**
     * @param string $query
     * @param BranchSearchCriteria|string[] $criteria
     * @param int $page
     * @param int $pageSize
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/catalog/branch/search
     * @return mappers\Branch[]|array()
     */
    public function branchSearch(
        $query,
        $criteria,
        $page = null,
        $pageSize = null,
        array $additionalFields = array()
    ) {
        return $this->getInternalList(
            'catalog/branch/search',
            'Branch',
            array_merge(
                $criteria instanceof BranchSearchCriteria ? $criteria->toArray() : $criteria,
                array(
                    'q'     => $query,
                    'page'  => $page,
                    'page_size' => $pageSize,
                    'fields' => self::getArray($additionalFields),
                )
            )
        );
    }
}
