<?php
namespace Dobine\Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dobine entity.
 *
 * @ORM\Entity
 */
class DobineEntity extends BaseEntity {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;
	
	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @param int $id
	 */
	public function setId(int $id) {
		$this->id = $id;
	}
}
