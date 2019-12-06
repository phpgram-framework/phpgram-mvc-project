<?php
namespace App\Http\Controller;

use Gram\Mvc\Lib\Controller\BaseController;

class DummyController extends BaseController
{
	private $tpl = 'index.temp';

	public function dummyFunction()
	{
		return $this->view($this->tpl,[
			'msg'=>"Test Controller"
		]);
	}
}