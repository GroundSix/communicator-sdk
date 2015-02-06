<?php namespace DataService;

use Resources\Resource;

class DataImporter extends Resource {

	public $DataImport;

	public function __construct($DataImport)
	{
		$this->$DataImport = $DataImport;
	}
}
