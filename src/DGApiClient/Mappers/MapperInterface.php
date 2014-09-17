<?php

namespace DGApiClient\Mappers;

/**
 * Interface MapperInterface
 * @package DGApiClient\Mappers
 */
interface MapperInterface
{

    /**
     * @param array $data
     * @return $this
     */
    public function populate(array $data);
}
