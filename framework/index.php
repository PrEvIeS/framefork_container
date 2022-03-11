<?php

use App\Classes\Connection;
use App\Classes\Dispatcher;
use App\Classes\Router;
use App\Classes\View;

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'vendor/autoload.php';
require_once 'app/Config/constant.php';

$routes = require $_SERVER['DOCUMENT_ROOT'] . '/app/Config/routes.php';


$router = new Router();
$track = $router->getTrack($routes, $_SERVER['REQUEST_URI']);

$dispatcher = new Dispatcher();
$page = $dispatcher->getPage($track);

$view = new View();
echo $view->render($page);
