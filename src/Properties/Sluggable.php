<?php
namespace Dobine\Properties;

use Doctrine\ORM\Mapping as ORM;

trait Sluggable {
	#[ORM\Column(name: "slug", type: "string", length: 191, unique: true, nullable: false)]
	protected string $slug;
	
	public function getSlug(): string {
		return $this->slug;
	}
	
	public function setSlug(string $slug): self {
		$this->slug = $slug;
		return $this;
	}
}
