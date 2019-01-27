<?php

namespace Core\Classes;

class DB
{

    /*
     * Class DB is responsible for connection to database
     */

    private static $link = null;

    public static function connect($dsn, $user = 'root', $pass = ''){
        try{
            if(self::$link != null) throw new PDOException('already connected to DB');
            self::$link = new \PDO($dsn, $user, $pass);
        }
        catch(PDOException $e){
            echo $e->getMessage().'<br/>'.'line: '.$e->getLine();
        }
    }

    public static function getDB(){
        return self::$link;
    }

    public static function close(){
        self::$link = null;
    }

    public function __clone(){

    }
    
    public function __wakeup(){

    }

    public function __construct(){

    }
}
