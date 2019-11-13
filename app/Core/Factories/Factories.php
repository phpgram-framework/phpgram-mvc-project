<?php
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