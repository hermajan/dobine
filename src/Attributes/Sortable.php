<?php
namespace Dobine\Attributes;

use Doctrine\ORM\Mapping as ORM;

trait Sortable {
	/**
	 * @var int
	 * @ORM\Column(name="`order`", type="integer", nullable=false, options={"default"="1"})
	 */
	protected $order = 1;
	
	/**
	 * @var bool
	 * @ORM\Column(name="visible", type="boolean", nullable=false, options={"default"="1"})
	 */
	protected $visible = true;
	
	public function getOrder(): int {
		return $this->order;
	}
	
	public function setOrder(int $order): self {
		$this->order = $order;
		return $this;
	}
	
	public function isVisible(): bool {
		return $this->visible;
	}
	
	public function setVisible(bool $visible): self {
		$this->visible = $visible;
		return $this;
	}
}
