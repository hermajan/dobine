<?php
namespace Dobine;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\{
	EntityManager, EntityRepository, OptimisticLockException, ORMException
};

/**
 * Base facade.
 * 
 * @property EntityManager $entityManager
 * @property EntityRepository $repository
 */
abstract class BaseFacade {
	public function getById($id) {
		return $this->repository->findOneBy(["id" => $id]);
	}
	
	public function getAll() {
		return new ArrayCollection($this->repository->findAll());
	}
	
	public function getForSelect($column = "name", $order = "ASC") {
		$output = [];
		
		$items = $this->repository->findBy([], [$column => $order]);
		foreach($items as $item) {
			$output[$item->id] = $item->{$column};
		}
		
		return $output;
	}
	
	public function search($needle, $limit = null, $column = "name") {
		$items = $this->repository->createQueryBuilder("i")->select("i.id, i.".$column)
			->where("i.".$column." LIKE :needle")->setParameters(["needle" => "%$needle%"])
			->setMaxResults($limit)
			->getQuery()->getResult();
		
		return $items;
	}
	
	/**
	 * @param BaseEntity|object $entity
	 * @return int ID of saved entity.
	 * @throws ORMException
	 */
	public function save($entity) {
		$this->entityManager->persist($entity);
		$this->entityManager->flush();
		
		return $entity->getId();
	}
	
	/**
	 * @param BaseEntity|object $entity
	 * @return int ID of updated entity.
	 * @throws ORMException
	 * @throws OptimisticLockException
	 */
	public function update($entity) {
		$this->entityManager->merge($entity);
		$this->entityManager->flush();
		
		return $entity->getId();
	}
	
	/**
	 * @param BaseEntity|object $entity
	 * @throws ORMException
	 * @throws OptimisticLockException
	 */
	public function remove($entity) {
		$this->entityManager->remove($entity);
		$this->entityManager->flush();
	}
}
