<?php namespace MessageService;

use Resources\Resource;

class DispatchControl extends Resource {
	public $control;
	public function __construct($control) {
		$this->control = $control;
	}
}
