<?php

namespace GroundSix\Communicator\Resources;

class Subscription extends Resource
{

    /** @var int */
    public $MailingListId;
    /** @var bool */
    public $Subscribed;
    /** @var bool */
    public $HonourExistingUnsubscribes;

    /**
     * @param int  $mailingListID
     * @param bool $subscribed
     * @param bool $honourExistingUnsubscribes
     */
    public function __construct(int $mailingListID, bool $subscribed = true, bool $honourExistingUnsubscribes = false)
    {
        $this->MailingListId = $mailingListID;
        $this->Subscribed = $subscribed;
        $this->HonourExistingUnsubscribes = $honourExistingUnsubscribes;
    }
}
