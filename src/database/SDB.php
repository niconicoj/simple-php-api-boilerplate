<?php

namespace Woodbrass\Database;


class SDB
{

	/**
	 * Database Instance
	 * @var Database
	 **/
	private $dbInstance = null;

	/**
	 * Instance de la classe SDB
	 * @var SDB
	 */
	private static $instance = null;

	private function __construct() {

		$this->dbInstance = new Database();

	}

	/**
	 * Function to call in order to get the database instance
	 * @return SDB
	 **/
	public static function getInstance() {

		if(is_null(self::$instance)){

			self::$instance = new SDB();

		}
		return self::$instance;

	}

	/**
	 * Perform a prepared SQL query
	 * @param String $query an SQL query to perform
	 * @param array $dataTab
	 * @return array|bool the result from the query as an array
	 */
	public function query( $query, $dataTab = array() ) {

		$preparedStmt= $this->dbInstance->prepare($query);
		return $this->dbInstance->execute($preparedStmt, $dataTab);

	}
}