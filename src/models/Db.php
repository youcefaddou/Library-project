<?php 

class Db {
    private static $instance; 

    protected static function getInstance(){
        try {
            self::$instance = new PDO("mysql:host=localhost;dbname=library","root",""); 
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        } catch (PDOException $err) {
            die($err->getMessage()); 
        }
        return self::$instance; 
    }

    protected static function disconnect(){
        self::$instance = null;
    }
}
?>