<?php

class Zed{
    static function get($name){
        return self::fromArray($_GET, $name);
        
    }
    static function post($name){
        return self::fromArray($_POST, $name);
        
    }
    static function session($name){
        return self::fromArray($_SESSION, $name);
        
    }
    static function cookie($name){
        return self::fromArray($_COOKIE, $name);
        
    }
    
    static function fromArray($array , $name){
        
        return isset($array[$name]) ? $array[$name] : null;
    }

    static function view($name , $data=[]){
        return new View($name , $data);
    }
    
    static function model($name){
        Router::instance()->loadModel($name);
        //print $x ? '111' :  '222';
        $className = ucfirst($name) . 'Model';
       // print($name);
        return new $className();
    }
}
class z extends Zed{}



