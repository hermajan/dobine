<?php
namespace Dobine\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dobine entity.
 *
 * @ORM\Entity
 */
class DobineEntity extends BaseEntity {
	use Identifier;
}
