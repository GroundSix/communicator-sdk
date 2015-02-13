<?php namespace GroundSix\Communicator\Services;
use GroundSix\Communicator\Resources\Resource;

abstract class Service {

	public $header;

	public $url = '';

	public function addHeader(Resource $header)
	{
		$this->header = $header;
	}



}
