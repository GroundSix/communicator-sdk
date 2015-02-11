<?php namespace DataService;

use Resources\Resource;
use Resources\SubscriptionInfo;

/**
 * Class UpdateContactSubscription
 * @package DataService
 */
class UpdateContactSubscription extends Resource {

    /**
     * @var
     */
    public $emailAddress;
    /**
     * @var subscription
     */
    public $subscription;


    /**
     * @param $EmailAddress
     * @param $subscription
     */
    function __construct($EmailAddress, $subscription)
    {
        $this->emailAddress = $EmailAddress;
        $this->subscription = $subscription;
    }

}