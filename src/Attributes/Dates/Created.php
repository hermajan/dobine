<?php
namespace Dobine\Attributes\Dates;

use Doctrine\ORM\Mapping as ORM;

trait Created {
	/**
	 * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
	 */
	protected \DateTime $created;
	
	public function getCreated(): \DateTime {
		return $this->created;
	}
	
	public function setCreated(): self {
		$this->created = new \DateTime();
		return $this;
	}
}
