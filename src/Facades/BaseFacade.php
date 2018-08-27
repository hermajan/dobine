<?php
namespace Dobine\Facades;

use Dobine\Entities\BaseEntity;
use Doctrine\ORM\{EntityManager, EntityRepository, OptimisticLockException, ORMException};

/**
 * Base facade.
 * 
 * @property EntityManager $entityManager
 * @property EntityRepository $repository
 */
abstract class BaseFacade {
	use CRUD;
	
	/**
	 * @return EntityRepository
	 */
	public function getRepository() {
		return $this->repository;
	}

	/**
	 * @return array
	 */
	public function getAll() {
		return $this->repository->findAll();
	}
	
	public function getForSelect($column = "name", $order = "ASC") {
		$output = [];
		$items = $this->repository->findBy([], [$column => $order]);
		foreach($items as $item) {
			$output[$item->id] = $item->{$column};
		}
		
		return $output;
	}
	
	/**
	 * @param BaseEntity|object $entity
	 * @throws ORMException
	 * @throws OptimisticLockException
	 */
	public function save($entity) {
		$this->entityManager->persist($entity);
		$this->entityManager->flush();
	}
}
