<?php

namespace GroundSix\Communicator\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static SubscriberSearchType ALL()
 * @method static SubscriberSearchType ONLY_SUBSCRIBED()
 * @method static SubscriberSearchType ONLY_EXPLICITLY_UNSUBSCRIBED()
 */
class SubscriberSearchType extends Enum
{
    const ALL = 'All';
    const ONLY_SUBSCRIBED = 'OnlySubscribed';
    const ONLY_EXPLICITLY_UNSUBSCRIBED = 'OnlyExplicitlyUnsubscribed';
}

