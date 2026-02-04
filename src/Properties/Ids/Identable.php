<?php

namespace Dobine\Properties\Ids;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\UnicodeString;

trait Identable {
	#[ORM\Column(name: "ident", type: "string", length: 191, unique: true, nullable: false)]
	protected string $ident;
	
	public function getIdent(): string {
		return $this->ident;
	}
	
	public function setIdent(string $ident): self {
		$unicodeString = new UnicodeString($ident);
		$this->ident = $unicodeString->trim()
			->pascal()
			->ascii()
			->toString();
		
		return $this;
	}
}
