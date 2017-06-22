<?php

namespace GroundSix\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static ControlCommand AUTHORISE()
 * @method static ControlCommand PAUSE()
 * @method static ControlCommand RESUME()
 * @method static ControlCommand CANCEL()
 */
class ControlCommand extends Enum
{
    const AUTHORISE = 'Authorise';
    const PAUSE = 'Pause';
    const RESUME = 'Resume';
    const CANCEL = 'Cancel';
}

