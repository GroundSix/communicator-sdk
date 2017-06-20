<?php

namespace GroundSix\Enum\MessageService;

use MyCLabs\Enum\Enum;

/**
 * @method static SortOrder OLDEST_FIRST()
 * @method static SortOrder NEWEST_FIRST()
 */
class SortOrder extends Enum
{
    const OLDEST_FIRST = 'OldestFirst';
    const NEWEST_FIRST = 'NewestFirst';
}
