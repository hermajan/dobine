<?php
namespace Dobine\Connections;

use Doctrine\DBAL\{Configuration, Connection, DBALException, DriverManager};

/**
 * Getting data from MySQL database via Doctrine.
 */
class DBAL {
	/** @var Connection */
	private $connection;
	
	/**
	 * DBAL constructor.
	 * @param array $parameters Array of parameters.
	 * @throws DBALException
	 */
	public function __construct(array $parameters = []) {
		$this->connect($parameters);
	}
	
	public function __destruct() {
		if(isset($this->connection)) {
			$this->disconnect();
		}
	}
	
	/**
	 * @param string $filename Path to the configuration file.
	 * @param string $section
	 * @return Connection
	 * @throws DBALException
	 */
	public function connectFromFile(string $filename, string $section) {
		$parameters = new Parameters();
		$params = $parameters->load($filename, $section);
		return $this->connect($params);
	}
	
	/**
	 * Connects into database.
	 * @param array $parameters Array of parameters.
	 * @return Connection Connection to desired database.
	 * @throws DBALException
	 */
	public function connect(array $parameters = []): Connection {
		$config = new Configuration();
		$this->connection = DriverManager::getConnection($parameters, $config);
		return $this->connection;
	}
	
	/**
	 * @return Connection
	 */
	public function getConnection(): Connection {
		return $this->connection;
	}
	
	/**
	 * Closes a connection.
	 * @param Connection|null $connection Connection to close.
	 */
	public function disconnect(Connection $connection = null) {
		if(!isset($connection)) {
			$this->connection->close();
		} else {
			$connection->close();
		}
	}
}
