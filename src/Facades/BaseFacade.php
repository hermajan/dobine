<?php
namespace Dobine\Facades;

use Dobine\Entities\BaseEntity;
use Doctrine\ORM\{Decorator\EntityManagerDecorator, EntityRepository};

/**
 * Base facade.
 *
 * @property EntityManagerDecorator $entityManager
 * @property EntityRepository $repository
 */
abstract class BaseFacade {
	use CRUD;
	
	public function getRepository(): EntityRepository {
		return $this->repository;
	}
	
	public function getAll(): array {
		return $this->repository->findAll();
	}
	
	/**
	 * @param BaseEntity|object $entity
	 */
	public function save($entity) {
		$this->create($entity);
	}
}
