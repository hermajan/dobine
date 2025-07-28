<?php
namespace Dobine\Properties\Ids;

use Doctrine\ORM\Exception\NotSupported;
use Doctrine\ORM\Mapping as ORM;

trait Id {
	#[ORM\Id]
	#[ORM\Column(name: "id", type: "integer", nullable: false)]
	#[ORM\GeneratedValue(strategy: "IDENTITY")]
	protected int $id;
	
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
