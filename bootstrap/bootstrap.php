<?php

require_once "constant.php";

require_once "../config/config.router.php";

require_once "../config/page/page.config.php";

$routeOptions= [
	'caching'=>ROUTECACHING,
	'cache'=>ROUTECACHE,
	'check_method'=>CHECKRM,
	'slash_trim'=>STRIM
];

use Gram\Project\App\AppFactory;
use Gram\Project\Lib\View\Strategy\GramViewStrategy;

//AppFactory::setRouterOptions($routeOptions);
AppFactory::setStrategy(new GramViewStrategy());
AppFactory::setBase(getenv('ROOT_URL_PATH'));

require_once "container.php";

require_once "../routes/web.routes.php";

require_once "../routes/api.routes.php";

/*
 * Starte die Seite
 */

AppFactory::init()->start();