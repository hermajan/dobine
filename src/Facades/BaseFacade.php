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
	public function getRepository(): EntityRepository {
		return $this->repository;
	}
	
	public function grabAll(): array {
		return $this->repository->findAll();
	}
	
	/**
	 * @param BaseEntity|object $entity
	 */
	public function save($entity) {
		$this->entityManager->persist($entity);
		$this->entityManager->flush($entity);
		return $entity;
	}
	
	/**
	 * @param BaseEntity|object $entity
	 */
	public function reload($entity) {
		$this->entityManager->refresh($entity);
		return $entity;
	}
	
	/**
	 * @param BaseEntity|object $entity
	 */
	public function delete($entity) {
		$this->entityManager->remove($entity);
		$this->entityManager->flush($entity);
	}
}
