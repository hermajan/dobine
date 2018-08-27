<?php
namespace Dobine\Entities\Accessors;

trait Accessors {
	public function __get($property) {
		if(property_exists($this, $property)) {
			return $this->{$property};
		}
		return null;
	}
	
	public function __set($property, $value) {
		if(property_exists($this, $property)) {
			$this->{$property} = $value;
		}
		return $this;
	}
}
