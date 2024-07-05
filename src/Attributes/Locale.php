<?php
namespace Dobine\Attributes;

use Doctrine\ORM\Mapping as ORM;

trait Locale {
	/**
	 * @ORM\Column(name="locale", type="string", length=5, nullable=false, options={"fixed"=true})
	 */
	protected string $locale;
	
	public function getLocale(): string {
		return $this->locale;
	}
	
	public function setLocale(string $locale): self {
		$this->locale = $locale;
		return $this;
	}
}
