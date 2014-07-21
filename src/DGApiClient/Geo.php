<?php

namespace DGApiClient;

class Geo extends AbstractDomainClient
{

    /**
     * Список гео объектов
     * @param $regionId
     * @param string[] $type
     * @param int $page
     * @param int $pageSize
     * @param string[] $additionalFields
     * @throws Exceptions\Exception
     * @return array|\DGApiClient\Mappers\MapperInterface[]
     */
    public function geoList($regionId,
        $type = array(),
        $page = null,
        $pageSize = null,
        array $additionalFields = array()
    ) {
        return $this->getInternalList(
            'geo/list',
            'Branch',
            array(
                'region_id' => $regionId,
                'type' => self::getArray($type),
                'page' => $page,
                'page_size' => $pageSize,
                'fields' => self::getArray($additionalFields),
            )
        );
    }
}
