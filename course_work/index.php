<?php

//print '123';
//1.
include '../common.php';
session_start();

header('Content-Type: text/html; charset=utf-8');
mb_internal_encoding('UTF-8');

define('DOC_ROOT', __DIR__);
define('BASE_URL','/course_work');
define('AVATAR_PATH','/course_work/avatars');
include_once DOC_ROOT . '/system/Router.php';
include_once DOC_ROOT . '/system/view.php';

foreach ([
    'Router',
    'view',
    'Model',
    'Zed'
] as $file){
    include_once DOC_ROOT . "/system/$file.php";
}


$router = Router::instance();
$router->load();
$router->run();
