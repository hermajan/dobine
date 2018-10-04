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
		$_SERVER["SERVER_NAME"] = "127.0.0.1";
		$db = new DBAL(__DIR__."/database.ini");
		$this->connection = $db->getConnection();
		
		$name = $this->connection->fetchColumn("SELECT name FROM heroes WHERE id = ?", [1]);
		Assert::equal("Tony Stark", $name);
	}
	
	public function testQuake() {
		$db = new DBAL(__DIR__."/database.neon");
		$this->connection = $db->getConnection();
		
		$name = $this->connection->fetchColumn("SELECT name FROM heroes WHERE city = ?", ["Hunan"]);
		Assert::equal("Daisy Johnson", $name);
	}
}

$testCase = new DBALTest;
$testCase->run();
