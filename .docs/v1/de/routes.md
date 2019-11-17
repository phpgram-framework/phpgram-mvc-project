# Routes

## Allgemein

- Routes legen fest was bei welcher Url aufgerufen werden muss (Handler)

- für normale Requests in der Datei /routes/web.routes.php

- für ajax Requests in /routes/api.routes.php 

- macht technisch keinen Unterschied, es wird dadurch übersichtlicher

## Aufbau

```php
<?php
use Gram\Project\App\AppFactory as Route;

Route::get("route","handler");
```

## Route Handler

- Der Handler wird ausgeführt wenn die jeweilige Route matched wurde

- Standardgemäß werden drei unterschiedliche Arten unterstüzt:
	- function
	- Class
	- Object

- weitere können mit plugins hinzugefügt werden

### Function Handler

- wird als anonyme Funktion definiert:

````php
<?php

use Gram\Project\App\AppFactory as Route;

//With function as handler
Route::get("/",function (){
	return "This page is the Start";
});
````

- die Function wird ausgeführt wenn die Route `/` aufgerufen wird

- eigenen sich sehr gut um z. B. Models zu testen

- Sollte nicht für komplexe oder aufwendige Funktionen eingesetzt werden

### Class Handler

- Beim Aufruf wird Auto Dependency Injection angewandt (siehe [Dependency Injection](di.md))

- wird als String angegeben

- String muss folgendes Muster haben: `"Classname@method"` das `@`trennt den Klassennamen und den Methodnamen

- die Class muss das Interface ``Gram\Middleware\Classes\ClassInterface`` implementiert haben (siehe [Controller](controller.md))

````php
<?php

use Gram\Project\App\AppFactory as Route;

use App\Http\Controller\DummyController;

Route::get("/controller",DummyController::class."@dummyFunction");
````

- mit `DummyController::class` wird der Class name als String angegeben (Class muss vorher import werden (mit use))
	- Vorteil: in IDE's wird diese Stelle auch bei find usages angezeigt
	
### Object Handler

- es kann ebenfalls ein bereits bestehendes Object ausgeführt werden

- die Klasse des Objects muss das Interface `Gram\Middleware\Handler\HandlerInterface` implementieren

````php
<?php

use Gram\Project\App\AppFactory as Route;

use App\Http\Controller\DummyController;

Route::get("/controller",new DummyController());
````

- die Method `handle()` wird dann ausgeführt

- eignet sich sehr gut für [Middleware](middleware.md) Handler


## Wildcard Route

- es können auch Routes mit variablen Parametern erstellt werde

- diese sind Platzhalter und sie können auch mit ihren Namen aufgerufen werden (z. B. in Middleware)

- die Platzhalter werden in `{ }` angegeben

````php
<?php
use Gram\Project\App\AppFactory as Route;

use App\Http\Controller\DummyController;

Route::get("/controller",DummyController::class."@dummyFunction");	//static Route without params

Route::get("/user/{id}",DummyController::class."@dummyFunction");	//dynamic Routes with Param: id
````

- im Function und Class Handler wird die auf zurufende Function mit den Parametern aus der Route aufgerufen

````php
<?php

use App\Core\Controller\BaseController;

class DummyController extends BaseController
{
	public function dummyFunction($id)
	{
		
	}
}
````

- oder

````php
<?php
use Gram\Project\App\AppFactory as Route;

Route::get("/user/{id}",function ($id){
	return $id;
});
````

### Wildcard Route mit Datentypen

- um die Routes noch weiter ein zuschränken, sodass z. B. in Controllern keine weitere Prüfung statt finden muss können Datentypen definiert werden

- die Typen werden als Regex angegeben

- Datentypen können: raw oder vordefiniert genutzt werden

````php
<?php
use Gram\Project\App\AppFactory as Route;

//without type
Route::get("/user/{id}",function ($id){
	return $id;
});

//only if id is an Integer: id = 1 -> match id = hello -> 404
Route::get("/user/{id:\d+}",function ($id){
	return $id;
});

//defined Types: n = Integer
Route::get("/user/{id:n}",function ($id){
	return $id;
});
````

- folgende Typen sind bereits definiert:
	- n: Integer
	- a: alphanumeric

### Datentypen definieren

- erfolgt in der Datei: config/routes.config.php

````php
<?php
use Gram\Route\Parser\StdParser;


StdParser::addDataTyp('lang','de|en');
StdParser::addDataTyp('langs','es|ru|fr');
````

- als erster Parameter wird der Typname angegeben, als zweiter die Regex


## Http Method

