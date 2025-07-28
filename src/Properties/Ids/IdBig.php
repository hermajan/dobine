<?php
namespace Dobine\Properties\Ids;

use Doctrine\ORM\Exception\NotSupported;
use Doctrine\ORM\Mapping as ORM;

trait IdBig {
	#[ORM\Id]
	#[ORM\Column(name: "id", type: "bigint", nullable: false, options: ["unsigned" => false])]
	#[ORM\GeneratedValue(strategy: "IDENTITY")]
	protected string $id;
	
	public function getId(): string {
		return $this->id;
	}
	
	/**
	 * @throws NotSupported
	 */
	public function setId() {
		throw new NotSupported("ID is set by database.");
	}
}
