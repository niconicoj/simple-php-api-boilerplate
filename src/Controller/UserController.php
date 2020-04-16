<?php

namespace Woodbrass\Controller;

use Woodbrass\Manager\UserManager;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 * @package Woodbrass\Controller
 */
class UserController
{
	/**
	 * @param int $id
	 */
	public static function get(int $id) {

		$user = UserManager::read($id);
		if($user){
			$response = new Response(
				$user->json(),
				Response::HTTP_OK,
				['content-type' => 'text/plain']
			);
		} else {
			$response = new Response(
				'{error: "user not found", code:"0"}',
				Response::HTTP_NOT_FOUND,
				['content-type' => 'text/json']
			);
		}
		$response->send();
	}
}