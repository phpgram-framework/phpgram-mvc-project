<?php
namespace App\Model;


class DummyModel
{
	public function getDummy($id)
	{
		return $id + 1;
	}
}