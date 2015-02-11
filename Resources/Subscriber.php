<?php namespace Resources;

/**
 * Class Subscriber
 * @package Resources
 */
class Subscriber {

    /**
     * @var array
     */
    public $ColumnMappings;

    /**
     * @var array
     */
    public $Subscriptions;

    /**
     * @var bool
     */
    public $IsGloballyUnsubscribed = false;


    /**
     * @param $email
     * @param $name
     * @param array $subscriptions
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

    /**
     * @return email
     */
    function getEmail()
    {
        return $this->ColumnMappings[0]->Value;
    }

}