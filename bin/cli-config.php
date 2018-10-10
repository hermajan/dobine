<?php
require_once __DIR__."/../vendor/autoload.php";

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Doctrine\ORM\Tools\Setup;

$isDevMode = false;

// the connection configuration
$parameters = [
	"driver" => "pdo_mysql",
	"host" => "localhost",
	"user" => "root",
	"password" => "",
	"dbname" => "testing",
    "paths" => [__DIR__."/entities"]
];

$config = Setup::createAnnotationMetadataConfiguration($parameters["paths"], $isDevMode);
$entityManager = EntityManager::create($parameters, $config);

return ConsoleRunner::createHelperSet($entityManager);
