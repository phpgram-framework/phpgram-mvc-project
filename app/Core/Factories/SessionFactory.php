<?php
namespace App\Core\Factories;

use Gram\Project\Lib\Session\SessionInterface;
use Gram\Project\Lib\Session\StdPhpSession;

class SessionFactory extends Factories
{
	/** @var SessionInterface */
	private static $session;

	/**
	 * @return SessionInterface|StdPhpSession
	 */
	public static function getSession()
	{
		if(!isset(self::$session)){
			self::$session = new StdPhpSession();
		}

		return self::$session;
	}
}