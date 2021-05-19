<?php
namespace Dobine\Entities;

use Dobine\Attributes\Id;
use Doctrine\ORM\Mapping as ORM;

/**
 * Dobine entity.
 *
 * @ORM\Entity
 */
class DobineEntity extends BaseEntity {
	use Id;
	
	public function toArray(): array {
		return get_object_vars($this);
	}
}
