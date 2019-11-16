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

namespace App\Core\Controller;

use Gram\Project\Lib\View\ViewInterface;

/**
 * Trait ControllerViewTrait
 * @package Gram\Project\Lib\Controller
 *
 * View Erweiterung
 */
trait ControllerViewTrait
{
	/** @var ViewInterface */
	protected $view;

	abstract protected function initView();

	/**
	 * @param $tpl
	 * @param array $vars
	 * @return ViewInterface
	 */
	protected function view($tpl,array $vars=[])
	{
		$this->initView();

		return $this->view->view($tpl,$vars);
	}
}