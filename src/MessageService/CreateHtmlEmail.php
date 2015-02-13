<?php namespace GroundSix\Communicator\MessageService;

use GroundSix\Communicator\Resources\Resource;

class CreateHtmlEmail extends Resource {
	public $message;
	public function __construct($message) {
		$this->message = $message;
	}

}
