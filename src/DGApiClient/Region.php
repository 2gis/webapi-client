<?php

namespace DGApiClient;

use DGApiClient\SearchCriteria\RegionSearchCriteria;

class Region extends AbstractDomainClient
{

    public static $scopes = array(
        'none' => array(),
        'full' => array('*')
    );

    /**
     * Список регионов
     * @param int $page
     * @param int $pageSize
     * @param string[] $localeFilter
     * @param string[] $countryCodeFilter
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/region/method/list
     * @return Region[]
     */
    public function getList(
        $page = null,
        $pageSize = null,
        array $localeFilter = array(),
        array $countryCodeFilter = array(),
        array $additionalFields = array()
    ) {
        return $this->getInternalList(
            'region/list',
            __NAMESPACE__ . '\Mappers\Region',
            array(
                'page' => (int)$page,
                'page_size' => (int)$pageSize,
                'locale_filter' => self::getArray($localeFilter),
                'country_code_filter' => self::getArray($countryCodeFilter),
                'fields' => self::getArray($additionalFields),
            )
        );
    }

    /**
     * Список регионов по id
     * @param int[] $ids
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/region/method/get
     * @return Mappers\Region|array
     */
    public function getListByIds($ids, array $additionalFields = array())
    {
        return $this->getInternalList(
            'region/get',
            __NAMESPACE__ . '\Mappers\Region',
            array(
                'id' => self::getArray($ids),
                'fields' => self::getArray($additionalFields)
            )
        );
    }

    /**
     * Регион по id филиала
     * @param int $branchId
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/region/method/get-by-branch-id
     * @return Mappers\Region|bool
     */
    public function getByBranch($branchId, array $additionalFields = array())
    {
        return $this->getSingle(
            'region/get',
            __NAMESPACE__ . '\Mappers\Region',
            array('branch_id' => (int)$branchId, 'fields' => self::getArray($additionalFields))
        );
    }

    /**
     * Регион по id
     * @param int $id
     * @param string[] $additionalFields
     * @link http://api.2gis.ru/doc/2.0/region/method/get
     * @return Mappers\Region|bool
     */
    public function get($id, array $additionalFields = array())
    {
        return $this->getSingle(
            'region/get',
            __NAMESPACE__ . '\Mappers\Region',
            array('id' => (int)$id, 'fields' => self::getArray($additionalFields))
        );
    }

    /**
     * Поиск региона
     * @param string $query
     * @param RegionSearchCriteria|string[] $criteria
     * @param string[] $additionalFields
     * @return Mappers\Region[]|array
     */
    public function search($query, $criteria = array(), array $additionalFields = array())
    {
        return $this->getInternalList(
            'region/search',
            __NAMESPACE__ . '\Mappers\Region',
            array_merge(
                $criteria instanceof RegionSearchCriteria ? $criteria->toArray() : $criteria,
                array(
                    'q' => $query,
                    'fields' => self::getArray($additionalFields)
                )
            )
        );
    }
}
