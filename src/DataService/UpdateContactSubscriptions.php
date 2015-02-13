<?php namespace GroundSix\Communicator\DataService;

use GroundSix\Communicator\Resources\Resource;
use GroundSix\Communicator\Resources\SubscriptionInfo;

class UpdateContactSubscriptions extends Resource {

    /**
     * @var string
     */
    public $emailAddress;
    /**
     * @var array Subscription
     */
    public $subscriptions;

    /**
     * @param $EmailAddress
     * @param array $Subscriptions
     */
    function __construct($EmailAddress, array $Subscriptions)
    {
        $this->emailAddress = $EmailAddress;

        $this->subscriptions = array_map(function ($value) {
            return new SubscriptionInfo($value[0], $value[1]);
        }, $Subscriptions);
    }


}