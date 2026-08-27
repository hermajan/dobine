<?php
namespace Dobine\Properties;

use Dobine\Utils\Strings;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait Sluggable {
	#[ORM\Column(name: "slug", type: Types::STRING, length: 255, nullable: true)]
	public ?string $slug = null {
		get => $this->slug;
		set => $this->slug = is_string($value) ? Strings::slugify($value) : $value;
	}
	
	public function getSlug(): ?string {
		return $this->slug;
	}
	
	public function setSlug(?string $slug): self {
		if(is_string($slug)) {
			$this->slug = Strings::slugify($slug);
		} else {
			$this->slug = $slug;
		}
		
		return $this;
	}
}
