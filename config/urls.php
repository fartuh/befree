<?php

use \Core\Classes\Router as Router;

$router = new Router;

// Routes

$router->get('', 'IndexController@index');
$router->get('{id}', 'IndexController@msg');
$router->get('users/{id}/msg', 'IndexController@msg');

// End
return $router;
