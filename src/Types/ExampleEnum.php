<?php
namespace Dobine\Types;

/**
 * Example implementation of EnumType.
 *
 * Usage in entity:
 *  * @var string
 *  * @ORM\Column(type="exampleEnum", nullable=false)
 *   private $enum;
 */
class ExampleEnum extends EnumType {
    protected $name = "exampleEnum";
    
    protected $values = ["4", "8", "15", "16", "23", "42"];
}
