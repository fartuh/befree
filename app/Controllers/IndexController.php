<?php

namespace App\Controllers;

use \Core\Classes\DB;
use \App\Models\User;

class IndexController extends Controller
{
    public function index(){
        $data = User::get();
        print_r($data);
        $this->view('index');
    }

    public function dashboard(){
        echo 'dashboard';
    }

    public function _404($params){
        echo 'url ' . $params['url'] . ' doesn\'t exist';
    }
}
