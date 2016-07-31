<?php

use App\Models\News;

define('APP_ROOT', __DIR__);

require APP_ROOT . '/vendor/autoload.php';
require APP_ROOT . '/App/helpers.php';

$controller = '\\App\\Controllers\\NewsController';
$action = 'Index';

preg_match('/^(?<controller>(\/admin)?\/\w+)(\/(?<action>\w+))?/', $_SERVER['REQUEST_URI'], $request);

if (isset($request['controller'])) {
    $controller = '\\App\\Controllers' . str_replace('/', '\\', ucwords($request['controller'], '/')) . 'Controller';
}

if (isset($request['action'])) {
    $action = ucfirst($request['action']);
}

(new $controller)->action($action);
