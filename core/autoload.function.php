<?php

spl_autoload_register(function ($class) {
    $str = '';
    $c = 0;
    $arr = explode('\\', $class);
    if($arr[0] == 'App')
        $app = true;
    else
        $app = false;
    foreach($arr as $path){
        $c += 1;
        if($c == 1){
            $str .= $path;
            continue;

        }
        $str .= '/' . $path;

    }

    if($app){
        require($str.'.php');
    }
    else{
        require(strtolower($str) . '.class.php');
    }
});
