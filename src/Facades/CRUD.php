<?php
namespace Dobine\Facades;

use Dobine\Entities\BaseEntity;
use Doctrine\ORM\{EntityManager, EntityRepository, OptimisticLockException, ORMException};

/**
 * Trait CRUD
 * 
 * @property EntityManager $entityManager
 * @property EntityRepository $repository
 */
trait CRUD {
	/**
	 * @param object $entity
	 * @throws ORMException
	 * @throws OptimisticLockException
	 */
	public function create($entity) {
		$this->entityManager->persist($entity);
		$this->entityManager->flush();
	}
	
	public function read() {
		return $this->repository->findAll();
	}
	
	/**
	 * @param BaseEntity|object $entity
	 * @throws ORMException
	 * @throws OptimisticLockException
	 */
	public function update($entity) {
		$this->entityManager->merge($entity);
		$this->entityManager->flush();
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
