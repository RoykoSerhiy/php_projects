<?php
include_once 'common.php';
define ('ROOT_DIR', __DIR__);

spl_autoload_register(function ($classname){
   $file = ROOT_DIR . '/clases/' . $classname . '.php';
   if(file_exists($file))
   {
        require_once $file;
   }
});
$module = isset($_GET['module']) ? $_GET['module'] : 'main';
$className = ucfirst($module);
//p($className);

$moduleInstance = new $className();


$method = isset($_GET['action']) ? $_GET['action'] : 'main';

$params = isset($_GET['param']) ? $_GET['param'] : [];
//$moduleInstance -> run();
$moduleInstance -> $method();
//call_user_func_array([$moduleInstance , $method],[]);
call_user_method_array([$moduleInstance , $method] , $params);


