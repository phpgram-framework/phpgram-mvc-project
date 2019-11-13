<?php
namespace App\Core\Factories;

use Gram\Project\Lib\Authenticate\UserController;
use Gram\Project\Lib\Authenticate\UserInterface;

class UserFactory extends Factories
{
	/** @var UserInterface */
	private static $user_instance=null;

	/** @var UserController */
	private static $controller_instance=null;


	/**
	 * @return UserInterface
	 */
	public static function getUser()
	{
		if(!isset(self::$user_instance)){
			self::$user_instance = new self::$userClass;
		}

		return self::$user_instance;
	}

	/**
	 * @return UserController
	 */
	public static function getController()
	{
		if(!isset(self::$controller_instance)){
			self::$controller_instance = new UserController(self::getUser());
		}

		return self::$controller_instance;
	}
}