<?php
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