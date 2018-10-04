<?php
namespace Dobine\Connections;

use Nette\Neon\Neon;

/**
 * Parameters.
 */
class Parameters {
	/**
	 * Loads parameters from configuration file.
	 * @param string $filename Path to the configuration file.
	 * @return array Array of parameters.
	 */
	public function load(string $filename): array {
		$extension = pathinfo($filename, PATHINFO_EXTENSION);
		
		if(method_exists($this, $extension)) {
			$parameters = $this->{$extension}($filename);
		} else {
			$parameters = [];
		}
		
		if(!isset($parameters["driver"])) {
			$parameters += ["driver" => "pdo_mysql"];
		}
		
		if(!isset($parameters["charset"])) {
			$parameters += ["charset" => "utf8", "driverOptions" => [1002 => "SET NAMES UTF8"]];
		}
		
		return $parameters;
	}
	
	/**
	 * Parses configuration from .ini file.
	 * @param string $filename Path to the configuration file.
	 * @return array Array of parameters.
	 */
	public function ini(string $filename): array {
		$ini = parse_ini_file($filename, true);
		if($ini !== false) {
			$parameters = $ini[Environment::choose()];
			return $parameters;
		} else {
			return [];
		}
	}
	
	/**
	 * Parses configuration from .neon file.
	 * @param string $filename Path to the configuration file.
	 * @return array Array of parameters.
	 */
	public function neon(string $filename): array {
		$neon = file_get_contents($filename);
		if($neon !== false) {
			$parameters = Neon::decode($neon);
			return $parameters;
		} else {
			return [];
		}
	}
}
