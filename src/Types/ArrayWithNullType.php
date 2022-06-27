<?php

namespace Dobine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ArrayType;

/**
 * Datatype for saving empty arrays as null in Doctrine entities.
 */
class ArrayWithNullType extends ArrayType {
	public function convertToDatabaseValue($value, AbstractPlatform $platform) {
		if(!isset($value)) {
			return null;
		} else {
			return serialize($value);
		}
	}
}
