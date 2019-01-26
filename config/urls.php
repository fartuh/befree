<?php

use \Core\Classes\Router as Router;

$router = new Router;

// Routes

$router->get('', 'IndexController@index');
$router->get('{id}/post/{post_id}', 'IndexController@post');

// End
return $router;
