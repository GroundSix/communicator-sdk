<?php namespace Resources;

class SubscriptionInfo extends Resource {

    public $MailingListId;
    public $IsSubscribed;
    public $DateLastAction;
    public $SubscriptionSourceType = 'TestCase';

    function __construct($MailingListId, $IsSubscribed = true)
    {
        $this->MailingListId = $MailingListId;
        $this->IsSubscribed = $IsSubscribed;
        $this->DateLastAction = date("Y-m-d\TH:i:s");
    }


}