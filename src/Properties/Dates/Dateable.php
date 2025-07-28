<?php
namespace Dobine\Properties\Dates;

use Doctrine\ORM\Mapping as ORM;

trait Dateable {
	use Created;
	
	#[ORM\Column(name: "updated", type: "datetime", nullable: true)]
	protected ?\DateTime $updated = null;
	
	public function getUpdated(): ?\DateTime {
		return $this->updated;
	}
	
	public function setUpdated(?\DateTime $updated): self {
		$this->updated = $updated;
		return $this;
	}
}
