<?php

namespace Dobine\Properties;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait Textable {
	#[ORM\Column(name: "title", type: Types::STRING, length: 255, nullable: true)]
	private ?string $title = null;
	
	#[ORM\Column(name: "perex", type: Types::TEXT, length: 65535, nullable: true)]
	protected ?string $perex = null;
	
	#[ORM\Column(name: "text", type: Types::TEXT, length: null, nullable: true)]
	protected ?string $text = null;
	
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
