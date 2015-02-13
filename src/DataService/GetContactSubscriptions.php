<?php namespace GroundSix\Communicator\DataService;

use GroundSix\Communicator\Resources\Resource;

class GetContactSubscriptions extends Resource {

    public $emailAddress;
    public $clientTableId;

    function __construct($emailAddress, $clientTableId)
    {
        $this->emailAddress = $emailAddress;
        $this->clientTableId = $clientTableId;
    }


}