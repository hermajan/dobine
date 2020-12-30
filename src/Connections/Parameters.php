<?php
namespace Dobine\Connections;

use Nette\Neon\Neon;

/**
 * Parameters.
 */
class Parameters {
	/**
	 * @param array $parameters Array of parameters.
	 * @return array Array of parameters.
	 */
	public function setDefaults(array $parameters): array {
		if(!isset($parameters["driver"])) {
			$parameters += ["driver" => "pdo_mysql"];
		}
		
		if(!isset($parameters["charset"])) {
			$parameters += ["charset" => "utf8", "driverOptions" => [1002 => "SET NAMES UTF8"]];
		}
		
		return $parameters;
	}
	
	/**
	 * Loads parameters from configuration file.
	 * @param string $filename Path to the configuration file.
	 * @param string|null $section Section in configuration file.
	 * @return array Array of parameters.
	 */
	public function load(string $filename, string $section = null): array {
		$parameters = [];
		if(!empty($filename)) {
			$extension = pathinfo($filename, PATHINFO_EXTENSION);
			
			if(method_exists($this, $extension)) {
				$parameters = $this->{$extension}($filename, $section);
			}
		}
		
		return $this->setDefaults($parameters);
	}
	
	/**
	 * Parses configuration from .ini file.
	 * @param string $filename Path to the configuration file.
	 * @param string|null $section Section in configuration file.
	 * @return array Array of parameters.
	 */
	public function ini(string $filename, string $section = null): array {
		$ini = parse_ini_file($filename, true);
		if($ini !== false) {
			if(empty($section)) {
				$parameters = $ini;
			} else {
				$parameters = $ini[$section];
			}
			
			return $this->setDefaults($parameters);
		} else {
			return [];
		}
	}
	
	/**
	 * Parses configuration from .neon file.
	 * @param string $filename Path to the configuration file.
	 * @param string|null $section Section in configuration file.
	 * @return array Array of parameters.
	 */
	public function neon(string $filename, string $section = null): array {
		$file = file_get_contents($filename);
		if($file !== false) {
			$neon = Neon::decode($file);
			if(empty($section)) {
				$parameters = $neon;
			} else {
				$parameters = $neon[$section];
			}
			
			return $this->setDefaults($parameters);
		} else {
			return [];
		}
	}
}
