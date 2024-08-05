<?php
namespace Dobine\Attributes;

use Doctrine\Common\Collections\Collection;

trait Treeable {
	protected ?object $parent = null;
	
	protected Collection $children;
	
	public function getParent(): ?self {
		return $this->parent;
	}

	public function hasParent(): bool {
		return $this->parent !== null;
	}
	
	public function getParents(?self $entity = null, array $parents = []): array {
		if(!isset($entity)) {
			$entity = $this;
		}
		
		if($entity->getParent() != null) {
			$parents[] = $entity->getParent();
			$parents = $this->getParents($entity->getParent(), $parents);
		}
		return $parents;
	}

	public function setParent(?self $parent): self {
		$this->parent = $parent;
		return $this;
	}
	
	public function getChildren(): Collection {
		return $this->children;
	}

	public function hasChildren(): bool {
		if($this->children->isEmpty()) {
			return false;
		}
		return true;
	}
	
	public function setChildren(Collection $children): self {
		$this->children = $children;
		return $this;
	}
	
	public function getRoot(?self $entity = null): self {
		if(!isset($entity)) {
			$entity = $this;
		}
		
		if($entity->getParent() != null) {
			return $this->getRoot($entity->getParent());
		}
		return $entity;
	}
	
	public function buildTree(?self $entity = null, array $branch = []): array {
		if(!isset($entity)) {
			$entity = $this;
		}
		$branch = ["entity" => $entity, "children" => []];
		
		if(count($entity->getChildren()->toArray())) {
			foreach($entity->getChildren() as $child) {
				$branch["children"][] = $this->buildTree($child, $branch);
			}
		}
		
		return $branch;
	}
}
