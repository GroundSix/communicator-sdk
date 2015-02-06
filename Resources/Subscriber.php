<?php namespace Resources;

class Subscriber {
    /**
     * @var ColumnMapping[]
     */
    public $ColumnMappings;
    /**
     * @var Subscription[]
     */
    public $Subscriptions;

    /**
     * @var IsGloballyUnsubscribed Boolean
     */
    public $IsGloballyUnsubscribed;

    function __construct($email, $name, array $subscriptions, $IsGloballyUnsubscribed = false)
    {
        $this->ColumnMappings = [
            new ColumnMapping(251173, $email),
            new ColumnMapping(251174, $name),
        ];

        $this->Subscriptions = array_map(function ($value) {
            return new Subscription($value);
        }, $subscriptions);

        $this->IsGloballyUnsubscribed = $IsGloballyUnsubscribed;
    }

}