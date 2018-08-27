<?php
namespace Dobine\Entities\Accessors;

use Nette\Utils\ArrayHash;

trait NetteAccessors {
	public function getFromValues(ArrayHash $values) {
		foreach($values as $key => $value) {
			$this->{$key} = $value;
		}
	}
}
