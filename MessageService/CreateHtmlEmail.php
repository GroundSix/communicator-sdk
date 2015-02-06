<?php namespace MessageService;

use Resources\Resource;

class CreateHtmlEmail extends Resource {
	public $message;
	public function __construct($message) {
		$this->message = $message;
	}

}
