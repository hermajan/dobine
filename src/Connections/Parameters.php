<?php
namespace Dobine\Connections;

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
	 * Parses configuration ini file.
	 * @param string $filename Path to the configuration file.
	 * @return array Array of parameters.
	 */
	public function ini(string $filename): array {
		$ini = parse_ini_file($filename, true);
		$parameters = $ini[Environment::choose()];
		return $parameters;
	}
}
