<?php
namespace Dobine\Types;

use Doctrine\DBAL\Types\ArrayType;
use Doctrine\DBAL\Platforms\AbstractPlatform;

/**
 * Datatype for saving empty arrarys as null in Doctrine entities.
 */
class ArrayWithNull extends ArrayType {
	public function convertToDatabaseValue($value, AbstractPlatform $platform) {
		if(!isset($value)) {
			return null;
		} else {
			return serialize($value);
		}
	}
}
