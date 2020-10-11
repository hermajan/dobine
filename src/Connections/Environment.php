<?php
namespace Dobine\Connections;

use Dotenv\Dotenv;

class Environment {
	const DEVELOPMENT = "development";
	const STAGE = "stage";
	const PRODUCTION = "production";
	
	/**
	 * Loads environment variables.
	 * @param string $filename Path to the .env file.
	 */
	public static function load(string $filename) {
		if(class_exists(Dotenv::class)) {
			$dotenv = new Dotenv($filename);
			$dotenv->load();
		}
	}
	
	/**
	 * Chooses environment.
	 * @param string|null $environment
	 * @return string
	 */
	public static function choose($environment = null) {
		if (!isset($environment)) {
			if(isset($_ENV["APP_ENV"])) {
				switch($_ENV["APP_ENV"]) {
					case "dev": case "development": default:
						$environment = Environment::DEVELOPMENT; break;
					case "stage":
						$environment = Environment::STAGE; break;
					case "prod": case "production":
						$environment = Environment::PRODUCTION; break;
				}
			} else {
				switch($_SERVER["SERVER_NAME"]) {
					case "localhost":
						$environment = Environment::DEVELOPMENT; break;
					default:
						$environment = Environment::PRODUCTION; break;
				}
			}
		} else {
			$environment = Environment::DEVELOPMENT;
		}
		
		return $environment;
	}
}
