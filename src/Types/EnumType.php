<?php
namespace Dobine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Type for saving enum values in Doctrine entities.
 */
abstract class EnumType extends Type {
	protected $name;
	
	protected $values = [];
	
	public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform) {
		$values = array_map(function($val) {
			return "'".$val."'";
		}, $this->values);
		
		return "ENUM(".implode(", ", $values).")";
	}
	
	public function convertToPHPValue($value, AbstractPlatform $platform) {
		return $value;
	}
	
	public function convertToDatabaseValue($value, AbstractPlatform $platform) {
		if(!in_array($value, $this->values)) {
			throw new \InvalidArgumentException("Invalid '".$this->name."' value.");
		}
		return $value;
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function requiresSQLCommentHint(AbstractPlatform $platform) {
		return true;
	}
}
