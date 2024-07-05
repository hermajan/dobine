<?php
namespace Dobine\Entities;

use Dobine\Attributes\Arrayable;
use Doctrine\ORM\Mapping as ORM;
use Nette\SmartObject;

/**
 * Base entity.
 *
 * @ORM\Entity
 */
abstract class BaseEntity {
	use Arrayable, SmartObject;
}
