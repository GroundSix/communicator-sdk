<?php

namespace GroundSix\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static DataImportUpdateMethod INSERT()
 * @method static DataImportUpdateMethod UPDATE()
 * @method static DataImportUpdateMethod UPSERT()
 */
class DataImportUpdateMethod extends Enum
{
    const INSERT = 'Insert';
    const UPDATE = 'Update';
    const UPSERT = 'Upsert';
}

