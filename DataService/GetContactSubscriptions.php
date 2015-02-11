<?php namespace DataService;

use Resources\Resource;

class GetContactSubscriptions extends Resource {

    public $emailAddress;
    public $clientTableId;

    function __construct($emailAddress, $clientTableId)
    {
        $this->emailAddress = $emailAddress;
        $this->clientTableId = $clientTableId;
    }


}