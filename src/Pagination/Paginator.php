<?php
namespace Dobine\Pagination;

use Doctrine\ORM\Tools\Pagination\Paginator as DoctrinePaginator;

class Paginator extends DoctrinePaginator {
	public function applyPaging(int $firstResult, int $maxResults): Paginator {
		$this->getQuery()->setFirstResult($firstResult)->setMaxResults($maxResults);
		return $this;
	}
	
	public function toArray(): array {
		try {
			return iterator_to_array(clone $this->getIterator(), true);
		} catch(\Exception $e) {
			return [];
		}
	}
}
