<?php
namespace Dobine\Properties;

use Doctrine\ORM\Mapping as ORM;

trait Sortable {
	#[ORM\Column(name: "`order`", type: "integer", nullable: false, options: ["default" => "1"])]
	public int $order = 1 {
		get => $this->order;
		set => $this->order = $value;
	}
	
	#[ORM\Column(name: "visible", type: "boolean", nullable: false, options: ["default" => "1"])]
	public bool $visible = true {
		get => $this->visible;
		set => $this->visible = $value;
	}
	
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
