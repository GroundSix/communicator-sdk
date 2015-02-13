<?php namespace GroundSix\Communicator\Resources;

abstract class Resource {

	public function __get($name)
	{
		$name = ucfirst($name);
		if (property_exists($this, $name)) {
			return $this->{$name};
		}
		throw new ResourceException("Unknown property: " . $name . " on " . get_class($this));
	}

	public function __set($name, $value)
	{
		$name = ucfirst($name);
		if (property_exists($this, $name)) {
			$this->{$name} = $value;
			return;
		}
		throw new ResourceException("Unknown property: " . $name . " on " . get_class($this));
	}
}
