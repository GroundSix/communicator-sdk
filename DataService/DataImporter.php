<?php namespace DataService;

use Resources\Resource;

class DataImporter extends Resource {

	/**
	 * @var
     */
	public $dataImport;
	/**
	 * @var int
     */
	public $ClientTableId = 34111;

	/**
	 * @param $dataImport
     */
	public function __construct($dataImport)
	{
		$this->dataImport = $dataImport;
	}
}
