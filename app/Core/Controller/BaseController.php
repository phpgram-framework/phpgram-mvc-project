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

use App\Core\Factories\ViewFactory;
use Gram\Middleware\Classes\ClassInterface;
use Gram\Middleware\Classes\ClassTrait;
use Gram\Project\Lib\Input;

abstract class BaseController implements ClassInterface
{
	use ClassTrait, ControllerInputTrait, ControllerViewTrait;

	protected function initInput()
	{
		if($this->input === null){
			$input = $this->request->getAttribute('InputClass',null);

			if($input===null){
				$this->input = new Input($this->request);
			}
		}
	}

	protected function initView()
	{
		if($this->view=== null){
			$this->view = ViewFactory::getView();
		}
	}
}