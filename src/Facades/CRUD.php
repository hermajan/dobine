<?php

namespace Dobine\Facades;

use Dobine\Entities\BaseEntity;
use Doctrine\ORM\{Decorator\EntityManagerDecorator, EntityRepository};

/**
 * Trait CRUD
 *
 * @property EntityManagerDecorator $entityManager
 * @property EntityRepository $repository
 */
trait CRUD {
	/**
	 * @param BaseEntity|object $entity
	 */
	public function create($entity) {
		$this->entityManager->persist($entity);
		$this->entityManager->flush($entity);
	}
	
	/**
	 * @param BaseEntity|object $entity
	 * @return BaseEntity|object
	 */
	public function read($entity) {
		$this->entityManager->refresh($entity);
		return $entity;
	}
	
	/**
	 * @param BaseEntity|object $entity
	 */
	public function update($entity) {
		$this->entityManager->persist($entity);
		$this->entityManager->flush($entity);
	}
	
	/**
	 * @param BaseEntity|object $entity
	 */
	public function delete($entity) {
		$this->entityManager->remove($entity);
		$this->entityManager->flush($entity);
	}
}
