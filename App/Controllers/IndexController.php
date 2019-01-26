<?php

namespace App\Controllers;

class IndexController extends Controller
{
    public function index(){
        echo 'index';
    }

    public function msg($p){
        print_r($p);
    }
}
