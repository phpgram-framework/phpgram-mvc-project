<?php
namespace App\Core\Factories;

use Gram\Project\Lib\DB\DBInterface;
use Gram\Project\Lib\DB\StdDB;

class DB extends Factories
{
	/** @var DBInterface */
	private static $_instance=null;

	/**
	 * @return DBInterface
	 */
	public static function db()
	{
		if(!isset(self::$_instance)){
			self::$_instance = new StdDB(
				getenv("DB_HOST"),
				getenv("DB_NAME"),
				getenv("DB_CHARSET"),
				getenv("DB_USER"),
				getenv("DB_USER_PW")
			);
		}

		return self::$_instance;
	}
}