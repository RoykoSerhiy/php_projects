<?php

class Router{
    private $url = '';
    private $segments = [];
    private static $baseUrl = BASE_URL;
    private $controller = 'main';
    private $method = 'index';
    private $params = [];
         
    static private $_instance = null;
    
    private function __construct() {
        
    }
    static function instance(){
        if(self::$_instance == null){
           self::$_instance = new Router(); 
        }
        return self::$_instance;
    }
            
    
    function load(){
        //print_r($_SERVER);
        $url = $_SERVER['REQUEST_URI'];
        $this->url = $url;
        $subFrom = strlen(self::$baseUrl);
        $url = substr($url,$subFrom);
          //print("url: " . $url);    
        if(strpos($url, '?')){
            $parts = explode('?', $url);
            $url = $parts[0];
        }
        $url = trim($url , "/");
  
        //print("url: " . $url); 
        $segments = explode("/" , $url);
        $this->segments = $segments;
        //print_r($this->segments);
        //controller/method/param1/param2...
        $segNum = count($segments);
        if($segNum > 0){
            $this->controller = $segments[0];
            if($segNum > 1){
                $this->method = $segments[1];
                if($segNum > 2){
                    $this->params = array_slice($segments,2);
                }
            }
        }
        //print_r($this->params);
    }
    function run(){
        if(! $this->loadController($this->controller)){
            die("file not found");
        }
        $className = ucfirst($this->controller) . 'Controller';
        $controller = new $className();
        //var_dump($controller);
        if(! method_exists($controller, $this->method)){
            die("action not defined");
        }
        call_user_func_array([$controller , $this->method] , $this->params);
    }
    function loadController($name){
       return $this->loadClass($name, 'controller');
    }
    function loadModel($name){
        return $this->loadClass($name,'model');
    }
        
    function loadClass($className , $type){
        if(class_exists($className)){
            return;
        }
        //print " $className , $type ";
        $suffix = ucfirst($type);
        $dir = $type . 's';
        $file = ucfirst($className) . '.php';
        $path = DOC_ROOT . '/' . $dir . '/'. $file; 
        //print" $path ";
        if(file_exists($path)){
            require_once $path;
            return true;
        }
        return false;
    }
    
    static function base(){
        return self::$baseUrl;
    }
    
}
