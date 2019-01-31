<?php

use \Core\Classes\Router as Router;

$router = new Router;

// Routes

$router->get('', 'IndexController@index');

$router->group('admin/', function($prefix) use ($router){
    $router->get($prefix.'dashboard', 'IndexController@dashboard');
});

$router->_404('IndexController@_404');

// End
return $router;
