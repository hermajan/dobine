<?php
namespace Dobine\Types;

use Doctrine\DBAL\Types\ArrayType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

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
