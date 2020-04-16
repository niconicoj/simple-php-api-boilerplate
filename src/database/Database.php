<?php

namespace Woodbrass\Database;

/**
 * Class Database
 * @package Database
 */
class Database
{
	/**
	 * @var \PDO
	 */
	private $pdo;

	/**
	 * Database constructor.
	 */
	public function __construct() {
		$this->connect();
	}

	/**
	 *
	 */
	private function connect() {
		$this->pdo = new \PDO( 'mysql:host='.$_ENV['DB_HOST'],
			$_ENV['DB_USER'], $_ENV['DB_PWD'], array( \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION ) );
	}

	/**
	 * @param string $query
	 * @return bool|\PDOStatement
	 */
	public function prepare(string $query) {
		return $this->pdo->prepare($query);
	}


	/**
	 * @param \PDOStatement $stmt
	 * @param array $params
	 * @return array
	 */
	public function execute(\PDOStatement $stmt, array $params = []) {
		$stmt->execute($params);
		return $stmt->fetchAll(\PDO::FETCH_OBJ);
	}
}