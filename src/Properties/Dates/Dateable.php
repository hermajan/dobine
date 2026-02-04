<?php
namespace Dobine\Properties\Dates;

use Doctrine\ORM\Mapping as ORM;

trait Dateable {
	use Creatable;
	
	#[ORM\Column(name: "updated", type: "datetime", nullable: true)]
	protected ?\DateTime $updated = null;
	
	public function getUpdated(): ?\DateTime {
		return $this->updated;
	}
	
	#[ORM\PreUpdate]
	public function setUpdated(): self {
		$this->updated = new \DateTime();
		return $this;
	}
}
