<?php

namespace Core\Classes;

class Controller
{

    protected function config($type){
        return require(CONFIG.$type.'.php');
    }

    protected function view($name, $params = []){
        foreach($params as $key => $param){
            $$key = $param;
        }
        include(CORE . 'assets.function.php');
        require(PUB . "views/$name.php");
    }

}
