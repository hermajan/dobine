<?php
namespace Dobine\Properties\Dates;

use Doctrine\ORM\Mapping as ORM;

trait Created {
	#[ORM\Column(name: "created", type: "datetime", nullable: false, options: ["default" => "CURRENT_TIMESTAMP"])]
	protected \DateTime $created;
	
	public function getCreated(): \DateTime {
		return $this->created;
	}
	
	public function setCreated(?\DateTime $created = null): self {
		if(!isset($created)) {
			$created = new \DateTime();
		}
		$this->created = $created;
		return $this;
	}
}
