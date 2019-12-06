<?php
/*
 * lege die Seiten fest die Besucht werden können
 */
use Gram\Project\App\AppFactory as Route;

use Gram\Mvc\Lib\Factories\ViewFactory as View;

use App\Http\Controller\DummyController;

/**
 * Beispiel Route mit einer function
 *
 * Diese Route wird auf der Startseite ausgeführt
 */
Route::get("/",function (){

	return View::getView()->view('index.temp',[
		'msg'=>"Wenn diese Seite erscheint wurde Phpgram richtig installiert"
	]);
});

/**
 * Beispiel Route mit Controller
 *
 * Diese Route startet einen Controller
 */
Route::get("/controller",DummyController::class."@dummyFunction");

/**
 * Beispiel Route mit Parameter
 *
 * hinter welcome/ kann alles stehen,
 * dieser Wert wird der Function (oder Controller Method) übergeben
 */
Route::get("/welcome/{name}",function ($name){
	return View::getView()->view('index.temp',[
		'msg'=>"Willkommen $name"
	]);
});