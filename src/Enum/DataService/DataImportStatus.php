<?php

namespace GroundSix\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static DataImportStatus AWAITING_AUTHORISATION()
 * @method static DataImportStatus AWAITING_IMPORTING()
 * @method static DataImportStatus PREPARING()
 * @method static DataImportStatus PENDING()
 * @method static DataImportStatus IMPORTING()
 * @method static DataImportStatus PAUSING()
 * @method static DataImportStatus PAUSED()
 * @method static DataImportStatus PAUSED_ON_ERROR()
 * @method static DataImportStatus RESTARTING()
 * @method static DataImportStatus CANCELLED()
 * @method static DataImportStatus CANCELLED_ON_DATA_ERROR()
 * @method static DataImportStatus COMPLETE()
 * @method static DataImportStatus FAILED()
 */
class DataImportStatus extends Enum
{
    const AWAITING_AUTHORISATION = 'AwaitingAuthorisation';
    const AWAITING_IMPORTING = 'AwaitingImporting';
    const PREPARING = 'Preparing';
    const PENDING = 'Pending';
    const IMPORTING = 'Importing';
    const PAUSING = 'Pausing';
    const PAUSED = 'Paused';
    const PAUSED_ON_ERROR = 'PausedOnError';
    const RESTARTING = 'Restarting';
    const CANCELLED = 'Cancelled';
    const CANCELLED_ON_DATA_ERROR = 'CancelledOnDataError';
    const COMPLETE = 'Complete';
    const FAILED = 'Failed';
}

