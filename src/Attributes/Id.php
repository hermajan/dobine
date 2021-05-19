<?php
namespace Dobine\Attributes;

use Doctrine\ORM\Mapping as ORM;

trait Id {
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
}
