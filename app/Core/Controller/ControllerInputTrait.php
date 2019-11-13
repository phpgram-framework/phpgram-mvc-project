<?php
namespace App\Core\Controller;

use Gram\Project\Lib\Input;

/**
 * Trait ControllerInputTrait
 * @package Gram\Project\Lib\Controller
 *
 * Input Erweiterung
 */
trait ControllerInputTrait
{
	/** @var Input */
	protected $input;

	abstract protected function initInput();

	/**
	 * Gibt zu einem geg. Index (kann auch ein Array sein)
	 * den passenden Inputwert zurück
	 *
	 * @param $name
	 * @param bool $clean
	 * @return mixed
	 */
	protected function getInput($name,$clean = true)
	{
		$this->initInput();

		return $this->input->get($name,$clean);
	}

	/**
	 * @param $name
	 * @param bool $strict
	 * @param bool $clean
	 * @return mixed|bool
	 */
	protected function gNcInput($name, $strict = true, $clean = true)
	{
		$this->initInput();

		return $this->input->gNc($name,$strict,$clean);
	}
}