<?php

namespace GroundSix\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static JobType BOUNCES()
 * @method static JobType OPENS()
 * @method static JobType CLICKS()
 * @method static JobType CONVERSIONS()
 * @method static JobType DISPATCH_UNSUBSCRIBES()
 * @method static JobType MAILING_LIST_UNSUBSCRIBES()
 * @method static JobType MAILING_LIST()
 * @method static JobType TABLE_RECORDS()
 * @method static JobType CLICKS_BY_LINK()
 * @method static JobType SENT()
 * @method static JobType SMS_DELIVERY_FAILURE()
 * @method static JobType SMS_DELIVERY_EXCLUSION()
 */
class JobType extends Enum
{
    const BOUNCES = 'Bounces';
    const OPENS = 'Opens';
    const CLICKS = 'Clicks';
    const CONVERSIONS = 'Conversions';
    const DISPATCH_UNSUBSCRIBES = 'DispatchUnsubscribes';
    const MAILING_LIST_UNSUBSCRIBES = 'MailingListUnsubscribes';
    const MAILING_LIST = 'MailingList';
    const TABLE_RECORDS = 'TableRecords';
    const CLICKS_BY_LINK = 'ClicksByLink';
    const SENT = 'Sent';
    const SMS_DELIVERY_FAILURE = 'SMSDeliveryFailure';
    const SMS_DELIVERY_EXCLUSION = 'SMSDeliveryExclusion';
}

