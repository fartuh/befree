<?php

use \Core\Classes\Router as Router;

$router = new Router;

// Routes

$router->get('', 'IndexController@index');

// End
return $router;
