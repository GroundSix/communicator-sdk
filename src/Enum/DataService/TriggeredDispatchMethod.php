<?php

namespace GroundSix\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static TriggeredDispatchMethod ONLY_SEND_TO_NEW_SUBSCRIBERS()
 * @method static TriggeredDispatchMethod SEND_TO_ALL_SUBSCRIBERS()
 */
class TriggeredDispatchMethod extends Enum
{
    const ONLY_SEND_TO_NEW_SUBSCRIBERS = 'OnlySendToNewSubscribers';
    const SEND_TO_ALL_SUBSCRIBERS = 'SendToAllSubscribers';
}

