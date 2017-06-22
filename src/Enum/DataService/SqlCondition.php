<?php

namespace GroundSix\Communicator\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static SqlCondition NONE()
 * @method static SqlCondition AND ()
 * @method static SqlCondition OR ()
 */
class SqlCondition extends Enum
{
    const NONE = 'None';
    const AND = 'AND';
    const OR = 'OR';
}

