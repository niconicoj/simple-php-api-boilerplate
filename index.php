<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require __DIR__ . '/vendor/autoload.php';

// chargement des variables d'environement
$dotEnv = \Dotenv\Dotenv::createImmutable(__DIR__);
$dotEnv->load();

// creation des routes
$dispatcher = FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
	$r->addGroup('/api', function (\FastRoute\RouteCollector $r) {
		$r->addRoute('GET', '/users/{id:\d+}', 'UserController:get');
	});
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
	$uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
	case FastRoute\Dispatcher::NOT_FOUND:
		// ... 404 Not Found
		break;
	case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
		$allowedMethods = $routeInfo[1];
		// ... 405 Method Not Allowed
		break;
	case FastRoute\Dispatcher::FOUND:
		$handler = $routeInfo[1];
		$vars = $routeInfo[2];
		list($class, $method) = explode(":", $handler, 2);
		call_user_func_array('Woodbrass\\Controller\\'.$class.'::'.$method, $vars);
		break;
}