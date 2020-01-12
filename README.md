[![](https://gitlab.com/grammm/php-gram/phpgram/raw/master/docs/img/Feather_writing.svg.png)](https://gitlab.com/grammm/php-gram/phpgram-mvc-project)

# phpgram mvc project

[![Packagist Version](https://img.shields.io/packagist/v/phpgram/mvc)](https://packagist.org/packages/phpgram/mvc)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/phpgram/mvc)](https://gitlab.com/grammm/php-gram/phpgram-mvc-project/blob/master/composer.json)
[![Packagist](https://img.shields.io/packagist/l/phpgram/mvc)](https://gitlab.com/grammm/php-gram/phpgram-mvc-project/blob/master/LICENSE)


## A fast and lightweight Mvc framework 

#### Build on top of [phpgram](https://gitlab.com/grammm/php-gram/phpgram) micro framework

## Features
- Simple and fast Http Routing

- [Psr 7](https://www.php-fig.org/psr/psr-7/) Request and Response with [Nyholm](https://github.com/Nyholm/psr7)

- [Psr 15](https://www.php-fig.org/psr/psr-15/) Middleware support

- [Psr 17](https://www.php-fig.org/psr/psr-17/) Factory with [Nyholm](https://github.com/Nyholm/psr7)

- Dependency Injection with [Psr 11 Container](https://www.php-fig.org/psr/psr-11/). Container from [pimple](https://github.com/silexphp/Pimple)

- Php Template System

- Basic Login, Authentication and Usermanagement via Php Session (or Redis Session with plugin)

- Basic Psr 7 Cookies

- **Async Requests ready**

## Installation

#### via [composer](https://getcomposer.org/)

`````bash
$ composer create-project phpgram/mvc
`````

## Initialize / Set up

1. copy file: env.config.php.dist and rename it to: env.config.php

2. complete the **Database** and **Path** information
	- for **ROOT_URL_PATH** = the relative Url Path (e.g.: `hello.de/my_folder/` -> `/my_folder` is the path)

3. done :) 

## [Documentation](https://gitlab.com/grammm/php-gram/phpgram-mvc-project/tree/master/.docs/index.md)

### Define Routes

````php
<?php
//file /routes/web.routes.php

use Gram\Project\App\AppFactory as Route;

use App\Http\Controller\DummyController;

//With function as handler
// for Url: / its return: This page is the Start
Route::get("/",function (){
	return "This page is the Start";
});

//with Controller (Class) as handler
//at Url: /controller: instantiate class DummyController (incl Dependency Injection) and call the method dummyFunction()
Route::get("/controller",DummyController::class."@dummyFunction");

//call this method with the value of id
Route::get("/user/{id}",DummyController::class."@dummyFunctionWithArgs");
````
### Define Controller

````php
<?php
//file: app/Http/Controller/DummyController.php

namespace App\Http\Controller;

use Gram\Mvc\Lib\Controller\BaseController;

class DummyController extends BaseController
{
	private $tpl = 'index.temp';	//template without the .php!

	public function dummyFunction()
	{
		return $this->view($this->tpl,[
			'msg'=>"Test Controller"
		]);
	}
	
	public function dummyFunctionWithArgs($id)
	{
		return $this->view($this->tpl,[
			'userId'=>$id
		]);
	}
}
````
### Define Templates

````php
<?php
	//file index.temp.php
$this->extend('defaultview'); //Values will being save for defaultview

$this->assign('h1',"Headline");	//assign variable h1 with the value Headline

//assign multiple variables at once
$this->assignArray([
	'title'=>"Test page",
	'my_awesome_button'=>"<button>Button</button>"
]);
?>

<?php 
//Starts a section. The content will be buffered
$this->start();?>
	<script type="text/javascript">
		alert("Hello! I am an alert box!!");
	</script>

	<style></style>
<?php 
//the content of this section will be available as variable head
$this->end('head');?>


<?php $this->start();?>
	<h2>Test Template</h2>
	
	<p>Welcome to phpgram mvc framework!</p>
<?php $this->end('content');?>

````
````php
<?php
	//file defaultview.php
?>

<html>

<head>
	<?= $title?>
	<?= $head?>
</head>

<body>
	<h1><?= $h1?></h1>
	
	<div class="content">
		
		<p> <?= $content?> </p>
    	
    	<?= $my_awesome_button?>
    	
	</div>
</body>

</html>
````

## License

phpgram is open source and under [MIT License](https://gitlab.com/grammm/php-gram/phpgram-mvc-project/blob/master/LICENSE)

