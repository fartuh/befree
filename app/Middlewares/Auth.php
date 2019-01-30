<?php

namespace App\Middlewares;

class Auth
{
    public function handle(){
        if(isset($_SESSION['id'])){
            return true;
        }
        else
            return false;
    }

    public function fail(){
        echo 'you are not logged in';
    }
}
