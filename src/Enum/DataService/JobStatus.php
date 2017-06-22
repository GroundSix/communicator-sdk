<?php

namespace GroundSix\Communicator\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static JobStatus NEW()
 * @method static JobStatus PROCESSING()
 * @method static JobStatus COMPLETE()
 * @method static JobStatus FAILED()
 * @method static JobStatus CANCELLED()
 * @method static JobStatus EXPIRED()
 */
class JobStatus extends Enum
{
    const NEW = 'New';
    const PROCESSING = 'Processing';
    const COMPLETE = 'Complete';
    const FAILED = 'Failed';
    const CANCELLED = 'Cancelled';
    const EXPIRED = 'Expired';
}

