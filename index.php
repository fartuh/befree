<?php

define('ROOT', __DIR__.'/');
define('CONFIG', ROOT.'config/');
define('PUB', ROOT.'public/');
define('CORE', ROOT.'core/');
define('CLASSES', CORE.'classes/');
define('MODULES', CORE.'modules/');

define('METHOD', $_SERVER['REQUEST_METHOD']);

require(CORE.'autoload.function.php');


use \Core\Classes\URL as URL;
use \Core\Classes\App as App;


// Let's get URL from the GET parameter and give it to URL class
$url = new URL($_GET['url']);


// Require config
$config['app'] = require(CONFIG.'app.php');


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

$params = $matched['params'];

// Let's get information
$controller = $matched['controller'];

App::findController($controller, $params);

//var_dump($router);
