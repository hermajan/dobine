<?php
namespace Dobine\Entities;

trait Identifier {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	private $id;
	
	/**
	 * @return int
	 */
	public function getId(): int {
		return $this->id;
	}
}
