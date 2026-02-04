<?php

namespace Dobine\Properties;

use Doctrine\ORM\Mapping as ORM;

trait Textable {
	#[ORM\Column(name: "perex", type: "text", length: 65535, nullable: true)]
	protected ?string $perex = null;
	
	#[ORM\Column(name: "text", type: "text", length: null, nullable: true)]
	protected ?string $text = null;
	
	public function getPerex(): ?string {
		return $this->perex;
	}
	
	public function setPerex(?string $perex): self {
		$this->perex = $perex;
		return $this;
	}
	
	public function getText(): ?string {
		return $this->text;
	}
	
	public function setText(?string $text): self {
		$this->text = $text;
		return $this;
	}
}
