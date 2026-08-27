<?php

namespace Dobine\Properties;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait Textable {
	#[ORM\Column(name: "title", type: Types::STRING, length: 255, nullable: true)]
	public ?string $title = null {
		get => $this->title;
		set => $this->title = $value;
	}
	
	#[ORM\Column(name: "perex", type: Types::TEXT, length: 65535, nullable: true)]
	public ?string $perex = null {
		get => $this->perex;
		set => $this->perex = $value;
	}
	
	#[ORM\Column(name: "text", type: Types::TEXT, length: null, nullable: true)]
	public ?string $text = null {
		get => $this->text;
		set => $this->text = $value;
	}
	
	public function getTitle(): ?string {
		return $this->title;
	}
	
	public function setTitle(?string $title): self {
		$this->title = $title;
		return $this;
	}
	
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
