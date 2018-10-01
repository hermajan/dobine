<?php
namespace Dobine\Connections;

require __DIR__."/../bootstrap.php";

use Doctrine\DBAL\{Connection, DBALException};
use Tester\{Assert, TestCase};

/**
 * Tests class DBAL.
 * @testCase
 */
class DBALTest extends TestCase {
	/** @var Connection */
	private $connection;
	
	/**
	 * @throws DBALException
	 */
	public function setUp() {
		$_SERVER["SERVER_NAME"] = "127.0.0.1";
		$db = new DBAL(__DIR__."/database.ini");
		$this->connection = $db->getConnection();
	}
	
	public function testIronMan() {
		$statement = $this->connection->executeQuery("SELECT name FROM heroes WHERE id=?", [1]);
		while($row = $statement->fetch()) {
			Assert::equal("Tony Stark", $row["name"]);
		}
	}
}

$testCase = new DBALTest;
$testCase->run();
