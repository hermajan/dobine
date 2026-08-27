<?php
declare(strict_types=1);

namespace Dobine\Subscribers;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ManyToManyOwningSideMapping;

class TablePrefixSubscriber implements EventSubscriber {
	private array $parameters;
	
	public function __construct(array $parameters) {
		$this->parameters = $parameters;
	}
	
	/**
	 * @return array
	 */
	public function getSubscribedEvents() {
		return ["loadClassMetadata"];
	}
	
	public function loadClassMetadata(LoadClassMetadataEventArgs $args): void {
		$classMetadata = $args->getClassMetadata();
		
		// Only add the prefixes to our own entities.
		if((strpos($classMetadata->namespace, (string)$this->parameters["namespace"])) !== false) {
			$prefix = (string)$this->parameters["prefix"];
			
			// Do not re-apply the prefix when the table is already prefixed
			if(!str_contains($classMetadata->getTableName(), $prefix)) {
				$tableName = $prefix.$classMetadata->getTableName();
				$classMetadata->setPrimaryTable(["name" => $tableName]);
			}
			
			foreach($classMetadata->getAssociationMappings() as $fieldName => $mapping) {
				if($mapping instanceof ManyToManyOwningSideMapping) {
					$mappedTableName = $mapping->joinTable->name;
					
					// Do not re-apply the prefix when the association is already prefixed
					if(str_contains($mappedTableName, $prefix)) {
						continue;
					}
					
					$mapping->joinTable->name = $prefix.$mappedTableName;
				}
			}
		}
	}
}
