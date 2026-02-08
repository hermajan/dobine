<?php
namespace Dobine\Properties\Ids;

use Doctrine\ORM\Mapping as ORM;

trait Id {
	#[ORM\Id]
	#[ORM\Column(name: "id", type: "integer", nullable: false)]
	#[ORM\GeneratedValue(strategy: "IDENTITY")]
	protected int $id;
	
	public function getId(): int {
		return $this->id;
	}
	
	public function setId(int $id): self {
		$this->id = $id;
		return $this;
	}
}
