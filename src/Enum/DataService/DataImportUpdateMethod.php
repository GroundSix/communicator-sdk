<?php

namespace GroundSix\Communicator\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static DataImportUpdateMethod INSERT()
 * @method static DataImportUpdateMethod UPDATE()
 * @method static DataImportUpdateMethod UPSERT()
 */
class DataImportUpdateMethod extends Enum
{
    /** Only insert new records */
    const INSERT = 'Insert';
    /** Only update existing records */
    const UPDATE = 'Update';
    /** Insert new records and update existing records. */
    const UPSERT = 'Upsert';
}
