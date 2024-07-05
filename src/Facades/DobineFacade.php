<?php
namespace Dobine\Facades;

use Dobine\Entities\BaseEntity;
use Doctrine\ORM\{Decorator\EntityManagerDecorator, EntityRepository};

/**
 * Dobine facade.
 *
 * @property EntityManagerDecorator $entityManager
 * @property EntityRepository $repository
 */
class DobineFacade extends BaseFacade {
	/**
	 * @param int|string $id ID of entity.
	 * @return BaseEntity|object|null
	 */
	public function grabById($id) {
		return $this->repository->findOneBy(["id" => $id]);
	}
	
	/**
	 * Gets data for <select> tag.
	 * @param string $column Name of column for key.
	 * @param string $order Sorting type (ASC or DESC).
	 */
	public function gatherForSelect(string $column = "name", string $order = "ASC"): array {
		$output = [];
		$items = $this->repository->findBy([], [$column => $order]);
		foreach($items as $item) {
			$output[$item->id] = $item->{$column};
		}
		
		return $output;
	}
	
	/**
	 * @param string $needle Searched query.
	 * @param int|null $limit For how many items to search.
	 * @param string $column Where to search.
	 */
	public function search(string $needle, ?int $limit = null, string $column = "name"): array {
		return $this->repository->createQueryBuilder("i")
			->where("i.".$column." LIKE :needle")->setParameters(["needle" => "%$needle%"])
			->setMaxResults($limit)
			->getQuery()->getResult();
	}
}
