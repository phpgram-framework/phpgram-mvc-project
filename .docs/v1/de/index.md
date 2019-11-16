# Basic Usage

## Routes definieren 

- Routes legen fest was bei welcher url aufgerufen werden muss

- für normale Requests in der Datei /routes/web.routes.php

- für ajax Requests in /routes/api.routes.php 

- macht technisch keinen Unterschied, es wird dadurch übersichtlicher

````php
<?php
//file /routes/web.routes.php

use Gram\Project\App\AppFactory as Route;

use App\Http\Controller\DummyController;

//With function as handler
Route::get("/",function (){
	return "This page is the Start";
});

//with Controller (Class) as handler
Route::get("/controller",DummyController::class."@dummyFunction");
````
- für den class name kann `DummyController::class` verwendet werden

- die method wird nach dem `@` bestimmt


## Controller

- Controller sind Klassen die von den Routes im normal Fall aufgerufen werden sollen

- Sie werden im Ordner app/Http/Controller erstellt mit dem Namespace App\Http\Controller

- Kümmern sich nur darum die Inputs und Aktionen des Users um zusetzen und das View vor zubereiten

- Sind nicht dafür zuständig Zugänge etc. zu prüfen

````php
<?php

use App\Core\Controller\BaseController;

class DummyController extends BaseController
{
	private $tpl = 'index.temp';	//template without the .php!

	public function dummyFunction()
	{
		return $this->view($this->tpl,[
			'msg'=>"Test Controller"
		]);
	}
}
````

- das View kann in Controllern mit der Method `view($template,$params)` aufgrufen werden

- Parameter die im Template aus Variablen behandelt werden sollen werden ale Array übergeben

	- key ist der Var Name und value ist der Variablen Wert


## View

- durch das view können Templates mit Variablen versehen und aus gegeben werden

- bei phpgram wird standardgemäß ein natives Templatesystem mit php angeboten

````php
<?php
	//file index.temp.php
?>

<?php $this->extend('defaultview'); ?>

<?php $this->assign('h1',"Headline");?>

<?php $this->assignArray([
	'title'=>"Test page",
	'my_awesome_button'=>"<button>Button</button>"
]);?>

<?php $this->start();?>
	<script type="text/javascript">
		alert("Hello! I am an alert box!!");
	</script>

	<style></style>
<?php $this->end('head');?>


<?php $this->start();?>
	<h2>Test Template</h2>
	
	<p>Welcome to phpgram mvc framework!</p>
<?php $this->end('content');?>

````

- `$this->extend('defaultview');` gibt an welches Template mit dem akutellen erweitert werden soll
	- gut geeignet um das grundlegende Layout aus zulagern und den Inhalt mit den einzelnen Templates erweitern 

- `$this->assign('h1',"Headline");` Definiert eine Variable auf die dann das erweiterte Template zugreifen kann

- `$this->assignArray([])` Definiert viele Variablen in einem Array, wobei der key der Variablen Name und der value der jeweilige Wert ist

- `$this->start();` Startet eine Content Section

- `$this->end('head');` Beendet eine Content Section und speichert ihren Inhalt als Variable ab

- Content Section sind Bereiche in denen Html und echo von php genutzt werden können. Diese Inhalte werden dann an anderer Stelle wieder ausgegeben

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
	<h1><?= $hi?></h1>
	
	<div class="content">
		<p>
    		<?= $content?>
    	</p>
    	
    	<?= $my_awesome_button?>
	</div>
</body>

</html>

````

- hier werden nun alle Variablen aus dem anderen Template ausgegeben

- die Ausgabe kann mit `<?= $vaule?>` erfolgen. Das ist kürzer als `<?php echo $value ?>`

## Model

- Model könnnen unterstüzend zum Controller im Ordner app/Model mit dem Namespace App\Model erstellt werden

- ihre Hauptaufgabe ist es Daten bereit zustellen (select) und diese auch zu bearbeiten (insert, update, delete)
