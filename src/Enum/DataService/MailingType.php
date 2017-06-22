<?php

namespace GroundSix\Communicator\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static MailingType EMAIL()
 * @method static MailingType SMS()
 */
class MailingType extends Enum
{
    const EMAIL = 'Email';
    const SMS = 'Sms';
}

