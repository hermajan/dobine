<?php

namespace Dobine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Type for saving enum values in Doctrine entities.
 */
abstract class EnumType extends Type {
	/** @var string Name for type for usage in entity. */
	protected $name;
	
	/** @var array Values for selection from enum type. */
	protected static $values = [];
	
	public function getName() {
		return $this->name;
	}
	
	public static function getValues(): array {
		return static::$values;
	}
	
	public function getSQLDeclaration(array $column, AbstractPlatform $platform) {
		$items = [];
		foreach(self::getValues() as $key => $val) {
			$items[$key] = "'".$val."'";
		}
		
		return "ENUM(".implode(", ", $items).")";
	}
	
	public function convertToPHPValue($value, AbstractPlatform $platform) {
		return $value;
	}
	
	public function convertToDatabaseValue($value, AbstractPlatform $platform) {
		if(!in_array($value, self::getValues())) {
			throw new \InvalidArgumentException("Value '".$value."' is invalid for '".$this->getName()."' type.");
		}
		
		return $value;
	}
	
	public function requiresSQLCommentHint(AbstractPlatform $platform) {
		return true;
	}
}
