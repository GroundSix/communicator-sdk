<?php namespace MessageService;

use Resources\Resource;

class CreateEmailDispatch extends Resource {

	public $emailDispatch;

	public function __construct($data)
	{
		$this->emailDispatch = $data;
	}
}
