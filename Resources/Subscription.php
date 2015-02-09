<?php namespace Resources;

class Subscription extends Resource {
	public $MailingListId;
	public $Subscribed;
	public $HonourExistingUnsubscribes;

	public function __construct ($MailingListId, $Subscribed = true, $HonourExistingUnsubscribes = false) {
		$this->MailingListId = $MailingListId;
		$this->Subscribed = $Subscribed;
		$this->HonourExistingUnsubscribes = $HonourExistingUnsubscribes;
	}

}
