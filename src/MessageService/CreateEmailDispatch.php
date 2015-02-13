<?php namespace GroundSix\Communicator\MessageService;

use GroundSix\Communicator\Resources\Resource;

class CreateEmailDispatch extends Resource {

	public $emailDispatch;

	public function __construct($data)
	{
		$this->emailDispatch = $data;
	}
}
