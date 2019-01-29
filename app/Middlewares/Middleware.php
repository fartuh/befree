<?php

namespace App\Middlewares;

class Middleware
{
    public function handle($request){
        return false;
    }

    public function fail(){
        echo 'failed';
    }
}
