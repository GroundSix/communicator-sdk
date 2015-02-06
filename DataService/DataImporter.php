<?php namespace DataService;

class DataImporter extends Resource {

	public $records;
	public $ClientTableId;

	public function __construct($ClientTableId, $records) {
		$this->records = $records;
		$this->ClientTableId = $ClientTableId;
	}
}
