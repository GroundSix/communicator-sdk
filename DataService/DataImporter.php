<?php namespace DataService;

use Resources\Resource;

class DataImporter extends Resource {

	public $dataImport;
	public $ClientTableId = 34111;

	public function __construct($dataImport)
	{
		$this->dataImport = $dataImport;
	}
}
