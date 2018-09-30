<?php
namespace Dobine\Connections;

use Doctrine\DBAL\{Configuration, Connection, DBALException, DriverManager};

/**
 * Getting data from MySQL database via Doctrine.
 */
class DBAL {
	/** @var Connection */
	private $connection;
	
	/** @var array */
	private $data;
	
	/**
	 * DBAL constructor.
	 * @param string $filename Path to the configuration file.
	 * @throws DBALException
	 */
	public function __construct(string $filename) {
		$parameters = new Parameters();
		$this->data = $parameters->load($filename);
		$this->connect($this->data);
	}
	
	/**
	 * Connects into database.
	 * @param array $parameters Array of parameters.
	 * @return Connection Connection to desired database.
	 * @throws DBALException
	 */
	public function connect(array $parameters = null): Connection {
		if(is_null($parameters)) {
			$parameters = $this->data;
		}
		
		$config = new Configuration();
		$this->connection = DriverManager::getConnection($parameters, $config);
		return $this->connection;
	}
	
	public function getConnection(): Connection {
		return $this->connection;
	}
	
	public function __destruct() {
		$this->connection->close();
	}
	
	/**
	 * Closes a connection.
	 * @param Connection $connection Connection to close.
	 */
	public function disconnect(Connection $connection = null) {
		if(!isset($connection)) {
			$this->connection->close();
		} else {
			$connection->close();
		}
	}
}
