<?php
namespace Dobine\Connections;

require __DIR__."/../bootstrap.php";

use Tester\{Assert, TestCase};

/**
 * Tests class Parameters.
 * @testCase
 */
class ParametersTest extends TestCase {
	/** @var Parameters */
	private $parameters;
	
	public function setUp() {
		$this->parameters = new Parameters();
	}
	
	public function testLoad() {
		$neon = $this->parameters->load(__DIR__."/database.neon", "doctrine");
		Assert::equal("pdo_mysql", $neon["driver"]);
	}
	
	public function testIni() {
		$ini = $this->parameters->ini(__DIR__."/database.ini", "development");
		Assert::equal("root", $ini["user"]);
	}
	
	public function testNeon() {
		$neon = $this->parameters->neon(__DIR__."/database.neon", "doctrine");
		Assert::equal("testing", $neon["dbname"]);
	}
}

$testCase = new ParametersTest;
$testCase->run();
