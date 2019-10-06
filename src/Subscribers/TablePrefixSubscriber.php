<?php

namespace Dobine\Subscribers;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LoadClassMetadataEventArgs;
use Doctrine\ORM\Mapping\ClassMetadataInfo;

class TablePrefixSubscriber implements EventSubscriber {
	/** @var array */
	private $parameters;
	
	/**
	 * Constructor
	 * @param array $parameters
	 */
	public function __construct(array $parameters) {
		$this->parameters = $parameters;
	}
	
	/**
	 * @return array
	 */
	public function getSubscribedEvents() {
		return ["loadClassMetadata"];
	}
	
	/**
	 * @param LoadClassMetadataEventArgs $args
	 * @return void
	 */
	public function loadClassMetadata(LoadClassMetadataEventArgs $args) {
		$classMetadata = $args->getClassMetadata();
		
		// Only add the prefixes to our own entities.
		if(false !== (strpos($classMetadata->namespace, (string)$this->parameters["namespace"]))) {
			$prefix = (string)$this->parameters["prefix"];
			
			// Do not re-apply the prefix when the table is already prefixed
			if(false === strpos($classMetadata->getTableName(), $prefix)) {
				$tableName = $prefix.$classMetadata->getTableName();
				$classMetadata->setPrimaryTable(["name" => $tableName]);
			}
			
			foreach($classMetadata->getAssociationMappings() as $fieldName => $mapping) {
				if($mapping["type"] === ClassMetadataInfo::MANY_TO_MANY && $mapping["isOwningSide"] === true) {
					$mappedTableName = $classMetadata->associationMappings[$fieldName]["joinTable"]["name"];
					
					// Do not re-apply the prefix when the association is already prefixed
					if(false !== strpos($mappedTableName, $prefix)) {
						continue;
					}
					
					$classMetadata->associationMappings[$fieldName]["joinTable"]["name"] = $prefix.$mappedTableName;
				}
			}
		}
	}
}
