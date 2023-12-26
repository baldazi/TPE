<?php

namespace App\Core;

use PDO;
use PDOException;
class Db extends PDO{
    /** 
    *instance unique de la classe 
    */
    private static $instance;

    /**
     * constructeur
     */
    private function __construct(){
        $_dsn = "sqlite:".__DIR__."/database.db";
        echo $_dsn;
        try{
            parent::__construct($_dsn);
            //$this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "self NAMES utf8");
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }catch(PDOException $e) {
            die($e->getMessage());
        }

    }

    static function getInstance():self
    {
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance;
    }
}