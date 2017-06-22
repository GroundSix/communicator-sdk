<?php

namespace GroundSix\Communicator\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static SubscriptionUpdateMethod SUBSCRIBE_ALL()
 * @method static SubscriptionUpdateMethod UNSUBSCRIBE_ALL()
 * @method static SubscriptionUpdateMethod HONOUR_EXISTING_UNSUBSCRIBES()
 */
class SubscriptionUpdateMethod extends Enum
{
    const SUBSCRIBE_ALL = 'SubscribeAll';
    const UNSUBSCRIBE_ALL = 'UnsubscribeAll';
    const HONOUR_EXISTING_UNSUBSCRIBES = 'HonourExistingUnsubscribes';
}

