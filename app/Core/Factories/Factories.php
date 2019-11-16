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

class Factories
{
	protected static $userClass, $view_tpl_path, $lang_path;

	public static function setUser($userClass)
	{
		self::$userClass = $userClass;
	}

	public static function setViewOptions($view_tpl_path)
	{
		self::$view_tpl_path = $view_tpl_path;
	}

	public static function setLangPath($lang_path)
	{
		self::$lang_path = $lang_path;
	}
}