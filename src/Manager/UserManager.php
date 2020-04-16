<?php

namespace Woodbrass\Manager;

use Woodbrass\Database\SDB;
use Woodbrass\Model\User;

/**
 * Class UserManager
 * @package Manager
 */
class UserManager
{
	/**
	 * @param int $id
	 * @return User|bool
	 */
	public static function read(int $id) {

		//querying DB for info
		$query = 'SELECT * FROM `database`.customers where customers_id=:id';
		$data = array('id' => $id);
		$res = SDB::getInstance()->query($query, $data);

		if(count($res) === 0) {
			return false;
		}
		//creating and populating User object
		$user = new User();

		$user->setId($id)
			->setName($res[0]->customers_firstname.' '.$res[0]->customers_firstname);

		return $user;
	}
}