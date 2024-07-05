<?php
namespace Dobine\Types\Enum;

use Doctrine\ORM\Mapping as ORM;

/**
 * Example implementation of EnumType.
 *
 * Usage in entity:
 *  * @var string
 *  * @ORM\Column(name="example", type="exampleEnum", nullable=false)
 *   private $example;
 */
class ExampleEnum extends EnumType {
	protected string $name = "exampleEnum";
	
	protected static array $values = ["4", "8", "15", "16", "23", "42"];
}
