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
		$neon = $this->parameters->load(__DIR__."/database.neon");
		Assert::equal("127.0.0.1", $neon["host"]);
	}
	
	public function testIni() {
		$_SERVER["SERVER_NAME"] = "127.0.0.1";
		$ini = $this->parameters->ini(__DIR__."/database.ini");
		Assert::equal("root", $ini["user"]);
	}
	
	public function testNeon() {
		$neon = $this->parameters->neon(__DIR__."/database.neon");
		Assert::equal("testing", $neon["dbname"]);
	}
}

$testCase = new ParametersTest;
$testCase->run();
