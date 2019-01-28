<?php

namespace DB\Migrations;

use Core\Classes\QueryBuilder;

class CreateTableUsers
{
    public function migrate(){
        QueryBuilder::execute("CREATE TABLE users(id INTEGER AUTO_INCREMENT, name VARCHAR(20), PRIMARY KEY(id))");
    }

    public function rollback(){
        QueryBuilder::destroy('users');
    }
}
