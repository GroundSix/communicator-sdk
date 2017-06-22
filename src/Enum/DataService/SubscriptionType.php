<?php

namespace GroundSix\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static SubscriptionType SINGLE_OPT_IN()
 * @method static SubscriptionType DOUBLE_OPT_IN()
 */
class SubscriptionType extends Enum
{
    const SINGLE_OPT_IN = 'SingleOptIn';
    const DOUBLE_OPT_IN = 'DoubleOptIn';
}

