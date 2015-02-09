<?php namespace Resources;

class Subscriber {
    /**
     * @var array
     */

    public $ColumnMappings;
    /**
     * @var Subscription[]
     */
    public $Subscriptions;

    /**
     * @var bool
     */
    public $IsGloballyUnsubscribed = false;

    /*
     *
     */
    function __construct($email, $name, array $subscriptions)
    {
        $this->ColumnMappings = [
            new ColumnMapping(252581, $email),
            new ColumnMapping(252582, $name),
        ];

        $this->Subscriptions = array_map(function ($value) {
            return new Subscription($value);
        }, $subscriptions);
    }

}