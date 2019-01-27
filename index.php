<?php

define('ROOT', __DIR__.'/');
define('CONFIG', ROOT.'config/');
define('PUB', ROOT.'public/');
define('DB', ROOT.'db/sqlite3/');
define('CORE', ROOT.'core/');
define('CLASSES', CORE.'classes/');
define('MODULES', CORE.'modules/');

define('METHOD', $_SERVER['REQUEST_METHOD']);

require(CORE.'autoload.function.php');
require(ROOT.'vendor/autoload.php');


use \Core\Classes\URL as URL;
use \Core\Classes\App as App;
use \Core\Classes\DB as DB;


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
    $controller = $router->get404();
    if($controller == null)
        exit('Error 404 not found');
    $matched = ['controller' => $controller, 'params' => ['url' => $url->getUrl('string')]];
}

// DB connection

$db_config = require(CONFIG.'db.php');

switch($db_config['db']){
    case null:
        break;
    case 'mysql':
        $mysql = $db_config['mysql'];
        $dsn = 'mysql:host='.$mysql['host'].';dbname='.$mysql['name'].';charset='.$mysql['charset'];
        DB::connect($dsn, $mysql['user'], $mysql['pass']);
        break;
    case 'sqlite3':
        $file = $db_config['sqlite3']['file'];
        $dsn = 'sqlite:'.DB.'sqlite3'.$file;
        DB::connect($dsn, '', '', true);
        break;
}
    
$params = $matched['params'];

// Let's get information
$controller = $matched['controller'];

App::findController($controller, $params);

DB::close();
