<?php
namespace Dobine\Facades;

use Dobine\Entities\BaseEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\{EntityManager, EntityRepository, OptimisticLockException, ORMException};

/**
 * Dobine facade.
 * 
 * @property EntityManager $entityManager
 * @property EntityRepository $repository
 */
class DobineFacade extends BaseFacade {
	/**
	 * @param int|string $id ID of entity.
	 * @return BaseEntity|object|null
	 */
	public function getById($id) {
		return $this->repository->findOneBy(["id" => $id]);
	}

	/**
	 * @return array|ArrayCollection
	 */
	public function getAll() {
		return new ArrayCollection(parent::getAll());
	}

	/**
	 * @param string $needle Searched query.
	 * @param int|null $limit For how many items to search.
	 * @param string $column Where to search.
	 * @return ArrayCollection
	 */
	public function search($needle, $limit = null, $column = "name") {
		$items = $this->repository->createQueryBuilder("i")->select("i.id, i.".$column)
			->where("i.".$column." LIKE :needle")->setParameters(["needle" => "%$needle%"])
			->setMaxResults($limit)
			->getQuery()->getResult();
		
		return new ArrayCollection($items);
	}
    
    
    /**
     * @param BaseEntity|object $entity
     * @return int ID of saved entity.
     * @throws ORMException
     * @throws OptimisticLockException
     */
	public function save($entity) {
		parent::save($entity);
		
		return $entity->getId();
	}
    
    /**
     * @param BaseEntity|object $entity
     * @return int ID of updated entity.
     * @throws ORMException
     * @throws OptimisticLockException
     */
	public function update($entity) {
		parent::update($entity);
		
		return $entity->getId();
	}
}
