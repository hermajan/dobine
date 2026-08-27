<?php

namespace Dobine\Properties\Ids;

use Dobine\Utils\Strings;
use Doctrine\ORM\Mapping as ORM;

trait Identable {
	#[ORM\Column(name: "ident", type: "string", length: 191, unique: true, nullable: false)]
	public string $ident {
		get => $this->ident;
		set => $this->ident = Strings::identify($value);
	}
	
	public function getIdent(): string {
		return $this->ident;
	}
	
	public function setIdent(string $ident): self {
		$this->ident = $ident;
		return $this;
	}
}
