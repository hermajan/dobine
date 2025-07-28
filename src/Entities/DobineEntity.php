<?php
namespace Dobine\Entities;

use Dobine\Properties\Ids\Id;
use Doctrine\ORM\Mapping as ORM;

/**
 * Dobine entity.
 *
 * @ORM\Entity
 */
class DobineEntity extends BaseEntity {
	use Id;
}
