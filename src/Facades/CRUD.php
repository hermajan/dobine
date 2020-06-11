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
	 * @param BaseEntity|object $entity
	 * @throws ORMException
	 * @throws OptimisticLockException
	 */
	public function create($entity) {
		$this->entityManager->persist($entity);
		$this->entityManager->flush($entity);
	}
	
	/**
	 * @param BaseEntity|object $entity
	 * @return BaseEntity|object
	 * @throws ORMException
	 */
	public function read($entity) {
		$this->entityManager->refresh($entity);
		return $entity;
	}
	
	/**
	 * @param BaseEntity|object $entity
	 * @throws ORMException
	 * @throws OptimisticLockException
	 */
	public function update($entity) {
		$this->entityManager->merge($entity);
		$this->entityManager->flush($entity);
	}
	
	/**
	 * @param BaseEntity|object $entity
	 * @throws ORMException
	 * @throws OptimisticLockException
	 */
	public function delete($entity) {
		$this->entityManager->remove($entity);
		$this->entityManager->flush($entity);
	}
}
