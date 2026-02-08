<?php
namespace Dobine\Properties;

use Doctrine\ORM\Mapping as ORM;

trait Iconable {
	#[ORM\Column(name: "icon", type: "string", length: 100, nullable: true)]
	protected ?string $icon;
	
	public function getIcon(): ?string {
		return $this->icon;
	}
	
	public function setIcon(?string $icon): self {
		$this->icon = $icon;
		return $this;
	}
	
	public function getIconTag(string $alt = "", string $class = ""): ?string {
		if($this->isIconFont()) {
			$classAttr = (!empty($class) ? ' '.$class : '');
			$titleAttr = !empty($alt) ? ' title="'.$alt.'"' : '';
			return '<i  class="'.$this->icon.$classAttr.'"'.$titleAttr.'></i>';
		}
		
		if($this->isIconImage() or $this->isIconLink()) {
			$classAttr = !empty($class) ? ' class="'.$class.'"' : '';
			return '<img src="'.$this->icon.'" alt="'.$alt.'"'.$classAttr.'>';
		}
		
		if($this->isIconEmoji()) {
			$classAttr = !empty($class) ? ' '.$class : '';
			$titleAttr = !empty($alt) ? ' title="'.$alt.'"' : '';
			return '<span class="emoji'.$classAttr.'"'.$titleAttr.'>'.$this->icon.'</span>';
		}
		
		return $this->icon;
	}
	
	public function isIconEmoji(): bool {
		if(!empty($this->icon)) {
			// Emoji regex pattern (covers most common emojis)
			return preg_match('/[\x{1F600}-\x{1F64F}\x{1F300}-\x{1F5FF}\x{1F680}-\x{1F6FF}\x{2600}-\x{26FF}\x{2700}-\x{27BF}]/u', $this->icon) === 1;
		}
		return false;
	}
	
	public function isIconFont(): bool {
		if(!empty($this->icon) and (str_starts_with($this->icon, "fa") or str_starts_with($this->icon, "bi"))) {
			return true;
		}
		return false;
	}
	
	public function isIconImage(): bool {
		if(!empty($this->icon) and str_starts_with($this->icon, "data:image")) {
			return true;
		}
		return false;
	}
	
	public function isIconSvg(): bool {
		if(!empty($this->icon) and str_starts_with($this->icon, "<svg")) {
			return true;
		}
		return false;
	}
	
	public function isIconLink(): bool {
		if(!empty($this->icon) and (str_starts_with($this->icon, "http") or str_starts_with($this->icon, "../") or str_starts_with($this->icon, "/"))) {
			return true;
		}
		return false;
	}
}
