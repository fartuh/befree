<?php

define('ROOT', __DIR__.'/');
define('CONFIG', ROOT.'config/');
define('CORE', ROOT.'core/');
define('CLASSES', CORE.'classes/');
define('MODULES', CORE.'modules/');

define('METHOD', $_SERVER['REQUEST_METHOD']);

require(CORE.'autoload.function.php');


use \Core\Classes\URL as URL;


// Let's get URL from the GET parameter and give it to URL class
$url = new URL($_GET['url']);


// Require routes
$router = require(CONFIG.'urls.php');


// Matching routes
if(METHOD == 'GET')
    $matched = $router->matchGet($url->getUrl());
else if(METHOD == 'POST')
    $matched = $router->matchPost($url->getUrl());


if($matched == false){
    exit('not found');
}


// Let's get information
$controller_method = $matched['controller'];
$params = $matched['params'];


// Getting names of a controller and a method
$path = explode('@', $controller_method);
$method = $path[1];
$controller = '\App\Controllers\\'.$path[0];


$app = new $controller();
if($params == false)
    $app->$method();
else
    $app->$method($params);


//var_dump($router);
