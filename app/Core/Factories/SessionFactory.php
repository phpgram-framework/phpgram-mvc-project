<?php
/**
 * phpgram mvc
 *
 * This File is part of the phpgram mvc framework
 *
 * Web: https://gitlab.com/grammm/php-gram/phpgram-mvc-project
 *
 * @license https://gitlab.com/grammm/php-gram/phpgram-mvc-projectblob/master/LICENSE
 *
 * @author Jörn Heinemann <joernheinemann@gmx.de>
 */

namespace App\Core\Factories;

use Gram\Project\Lib\Session\SessionInterface;
use Gram\Project\Lib\Session\StdPhpSession;

class SessionFactory extends Factories
{
	/** @var SessionInterface */
	private static $session;

	/**
	 * @return SessionInterface
	 */
	public static function getSession()
	{
		if(!isset(self::$session)){
			self::$session = new StdPhpSession();
		}

		return self::$session;
	}
}