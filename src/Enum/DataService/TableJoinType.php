<?php

namespace GroundSix\Communicator\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static TableJoinType INNER()
 * @method static TableJoinType OUTER()
 */
class TableJoinType extends Enum
{
    const INNER = 'Inner';
    const OUTER = 'Outer';
}

