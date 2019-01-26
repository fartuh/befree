<?php

namespace App\Controllers;

class IndexController extends Controller
{
    public function index(){
        $this->view('index');
    }

    public function post($params){
        print_r($params);
    }

}
