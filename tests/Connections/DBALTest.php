<?php
namespace Dobine\Connections;

require __DIR__."/../bootstrap.php";

use Doctrine\DBAL\Connection;
use Tester\{Assert, TestCase};

/**
 * Tests class DBAL.
 * @testCase
 */
class DBALTest extends TestCase {
	/** @var Connection */
	private $connection;
	
	public function testIronMan() {
		$db = new DBAL();
		$this->connection = $db->connectFromFile(__DIR__."/database.neon", "doctrine");
		
		$name = $this->connection->fetchOne("SELECT name FROM heroes WHERE id = ?", [1]);
		Assert::equal("Tony Stark", $name);
	}
	
	public function testQuake() {
		$db = new DBAL();
		$this->connection = $db->connectFromFile(__DIR__."/database.ini", "development");
		
		$name = $this->connection->fetchOne("SELECT name FROM heroes WHERE city = ?", ["Hunan"]);
		Assert::equal("Daisy Johnson", $name);
	}
}

$testCase = new DBALTest;
$testCase->run();
