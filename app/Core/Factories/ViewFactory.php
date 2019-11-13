<?php
namespace App\Core\Factories;


use Gram\Project\Lib\View\StdViewInterface;
use Gram\Project\Lib\View\View;

class ViewFactory extends Factories
{
	/** @var StdViewInterface */
	private static $_instance=null;

	/**
	 * @return StdViewInterface
	 */
	public static function getView()
	{
		if(!isset(self::$_instance)){
			self::$_instance = new View(self::$view_tpl_path);
		}

		return self::$_instance;
	}
}