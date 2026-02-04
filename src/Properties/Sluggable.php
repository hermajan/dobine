<?php
namespace Dobine\Properties;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\String\Slugger\AsciiSlugger;

trait Sluggable {
	#[ORM\Column(name: "slug", type: "string", length: 191, unique: true, nullable: false)]
	protected string $slug;
	
	public function getSlug(): string {
		return $this->slug;
	}
	
	public function setSlug(string $slug): self {
		$slugger = new AsciiSlugger();
		if($slug !== '' && $slug[0] === '/') {
			$slug = substr($slug, 1);
		}
		$segments = array_map(fn(string $part) => $slugger->slug($part)
			->lower()
			->trim()
			->toString(), explode('/', $slug));
		$this->slug = implode('/', $segments);
		return $this;
	}
}
