<?php namespace Services;
use Resources\Resource;
use SoapClient;
use SoapHeader;
use ReflectionClass;
abstract class Service {

	public $header;

	public $url = '';

	public function addHeader(Resource $header)
	{
		$this->header = $header;
	}



}
