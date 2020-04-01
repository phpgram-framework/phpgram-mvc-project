<?php

/*
 * Composer und Autoloader
 */
require_once "../vendor/autoload.php";

/*
 * Env Configs
 */
if(file_exists("../env.local.php")) {
	@require_once "../env.local.php";
} else {
	require_once "../env.php";
}

/*
 * Konstanten laden
 */
require_once "../bootstrap/constant.php";

/*
 * Conf File des Routers laden
 */
require_once "../config/config.router.php";

/*
 * eigene Einstellungen
 */
require_once "../config/page.config.php";

use Gram\Project\App\AppFactory as App;
use Gram\Project\Lib\View\Strategy\GramViewStrategy;

App::setRouterOptions([
	'caching'=>ROUTECACHING,
	'cache'=>ROUTECACHE,
	'slash_trim'=>STRIM
]);

App::setStrategy(new GramViewStrategy());

App::setBase(getenv('ROOT_URL_PATH'));

require_once "../bootstrap/container.php";

require_once "../routes/web.routes.php";

require_once "../routes/api.routes.php";

/*
 * Starte die Seite
 */

$factory = new \Nyholm\Psr7\Factory\Psr17Factory();	//Psr 17 Factory

App::setResponseFactory($factory);

$requestCreator = new \Nyholm\Psr7Server\ServerRequestCreator(
	$factory,
	$factory,
	$factory,
	$factory
);

$request = $requestCreator->fromGlobals();

App::start($request);