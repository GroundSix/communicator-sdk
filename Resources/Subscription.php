<?php namespace Resources;

class Subscription extends Resource {
	public $MailingListId;
	public $Subscribed;
	public $HonourExistingUnsubscribes = false;

	public function __construct ($MailingListId, $Subscribed = true) {
		$this->MailingListId = $MailingListId;
		$this->Subscribed = $Subscribed;
	}

}
