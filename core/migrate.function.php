<?php

function migrate(){
    $files = scandir(DB.'migrations/');
    foreach($files as $file){
        if($file == '.' || $file == '..' || explode('.', $file)[0] == '') continue;
        require_once(DB.'migrations/'.$file);
    } 
}
