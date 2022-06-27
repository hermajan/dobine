<?php

namespace Dobine\Attributes;

use Doctrine\ORM\Exception\NotSupported;
use Doctrine\ORM\Mapping as ORM;

trait Id {
	/**
	 * @var int
	 * @ORM\Column(name="id", type="integer", nullable=false)
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="IDENTITY")
	 */
	protected $id;
	
	public function getId(): int {
		return $this->id;
	}
	
	/**
	 * @throws NotSupported
	 */
	public function setId() {
		throw new NotSupported("ID is set by database.");
	}
}
