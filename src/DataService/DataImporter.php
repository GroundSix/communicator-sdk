<?php

namespace GroundSix\Communicator\DataService;

use GroundSix\Communicator\Resources\DataImport;
use GroundSix\Communicator\Resources\Resource;

class DataImporter extends Resource
{
    /**
     * @var
     */
    protected $dataImport;

    /**
     * @param $dataImport
     */
    public function __construct(DataImport $dataImport)
    {
        $this->dataImport = $dataImport;
    }
}
