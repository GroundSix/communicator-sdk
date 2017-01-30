<?php

namespace GroundSix\Communicator\Resources;

class DataImport
{
    /** @var int The ID of the table to import into */
    protected $ClientTableId;
    /** @var  null|DataRecord[] An array of data records to import */
    protected $Records = null;
    /** @var null|string The insert method */
    protected $Type;

    /**
     * @param int        $clientTableId
     * @param array|null $records
     * @param string     $type
     */
    public function __construct(int $clientTableId, array $records = [], string $type = null)
    {
        $this->ClientTableId = $clientTableId;
        foreach ($records as $record) {
            $this->addRecord($record);
        }
        $this->Type = $type;
    }

    protected function addRecord(DataRecord $record)
    {
        $this->Records[] = $record;
    }
}
