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