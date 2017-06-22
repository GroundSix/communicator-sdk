<?php

namespace GroundSix\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static ParameterType IGNORE()
 * @method static ParameterType COLUMN()
 * @method static ParameterType FIXED()
 * @method static ParameterType CUSTOM()
 */
class ParameterType extends Enum
{
    const IGNORE = 'Ignore';
    const COLUMN = 'Column';
    const FIXED = 'Fixed';
    const CUSTOM = 'Custom';
}

