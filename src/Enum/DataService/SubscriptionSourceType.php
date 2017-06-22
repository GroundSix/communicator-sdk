<?php

namespace GroundSix\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static SubscriptionSourceType TEST_CASE()
 * @method static SubscriptionSourceType DATA_IMPORT()
 * @method static SubscriptionSourceType DATA_CAPTURE_FORM()
 * @method static SubscriptionSourceType MANUAL_ENTRY()
 * @method static SubscriptionSourceType WEB_SERVICE()
 * @method static SubscriptionSourceType SUBSCRIPTION_CONFIRMATION()
 * @method static SubscriptionSourceType MOBILE_DATA_FORM()
 */
class SubscriptionSourceType extends Enum
{
    const TEST_CASE = 'TestCase';
    const DATA_IMPORT = 'DataImport';
    const DATA_CAPTURE_FORM = 'DataCaptureForm';
    const MANUAL_ENTRY = 'ManualEntry';
    const WEB_SERVICE = 'WebService';
    const SUBSCRIPTION_CONFIRMATION = 'SubscriptionConfirmation';
    const MOBILE_DATA_FORM = 'MobileDataForm';
}

