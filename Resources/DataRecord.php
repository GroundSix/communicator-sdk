<?php namespace Resources;

class DataRecord extends Resource {
	/**
	 * @var Subscription[]
	 */
	public $Subscriptions;
	/**
	 * @var ColumnMapping[]
	 */
	public $ColumnMappings;

	public $IsGloballyUnsubscribed;

	/**
	 * @param Subscription[]	$Subscriptions
	 * @param ColumnMapping[]	$ColumnMappings
	 */
	function __construct(array $Subscriptions, array $ColumnMappings, $IsGloballyUnsubscribed = false)
	{
		$this->Subscriptions = $Subscriptions;
		$this->ColumnMappings = $ColumnMappings;
		$this->IsGloballyUnsubscribed = $IsGloballyUnsubscribed;
	}


}
