<?php namespace GroundSix\Communicator\MessageService;

use GroundSix\Communicator\Resources\Resource;

class DispatchControl extends Resource {
	public $control;
	public function __construct($control) {
		$this->control = $control;
	}
}
