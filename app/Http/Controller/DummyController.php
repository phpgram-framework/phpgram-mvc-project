<?php
namespace App\Http\Controller;

use App\Core\Controller\BaseController;

class DummyController extends BaseController
{
	private $tpl = 'index.temp';

	public function dummyFunction()
	{
		return $this->view($this->tpl,[
			'msg'=>"Ein Test Controller"
		]);
	}
}