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
	
	/**
	 * @param BaseEntity|object $entity
	 * @throws ORMException
	 * @throws OptimisticLockException
	 */
	public function save($entity) {
		$this->create($entity);
	}
}
