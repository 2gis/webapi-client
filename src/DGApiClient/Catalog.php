<?php

namespace DGApiClient;

use DGApiClient\SearchCriteria\BranchSearchCriteria;
use DGApiClient\Mappers\Rubric;

class Catalog extends AbstractDomainClient
{

    const SORT_NAME = 'name';
    const SORT_POPULARITY = 'popularity';

    public static $scopes = array(
        'none' => array(),
        'full' => array('*'),
    );

    /**
     * Поиск рубрик
     * @param int $regionId
     * @param int $parentId
     * @param string $sort
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/list
     * @return Rubric[]
     */
    public function getRubricList($regionId, $parentId = 0, $sort = self::SORT_NAME)
    {
        return $this->getInternalList(
            'catalog/rubric/list',
            __NAMESPACE__ . '\Mappers\Rubric',
            array(
                'region_id' => (int)$regionId,
                'parent_id' => (int)$parentId,
                'sort' => $sort,
            )
        );
    }

    /**
     * Получение рубрики
     * @param int $id
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/get
     * @return Rubric|bool
     */
    public function getRubric($id)
    {
        return $this->getSingle(
            'catalog/rubric/get',
            __NAMESPACE__ . '\Mappers\Rubric',
            array('id' => (int)$id)
        );
    }

    /**
     * Получение рубрики по псевдониму
     * @param string $alias
     * @param int $regionId
     * @link http://api.2gis.ru/doc/2.0/catalog/rubric/get-by-alias
     * @return Rubric|bool
     */
    public function getRubricByAlias($alias, $regionId)
    {
        return $this->getSingle(
            'catalog/rubric/get',
            __NAMESPACE__ . '\Mappers\Rubric',
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
            __NAMESPACE__ . '\Mappers\Branch',
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
     * @param array $additionalFields
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
            __NAMESPACE__ . '\Mappers\Branch',
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
