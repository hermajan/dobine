<?php
namespace Dobine\Attributes;

use Doctrine\ORM\Mapping as ORM;

trait Created {
	/**
	 * @var \DateTime
	 * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
	 */
	protected $created;
	
	public function getCreated(): \DateTime {
		return $this->created;
	}
	
	public function setCreated(): self {
		$this->created = new \DateTime();
		return $this;
	}
}
