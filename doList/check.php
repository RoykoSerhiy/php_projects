<?php

$param = (object)[
  'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'testwork',
    'user' => 'root',
    'pass' => ''
];

$db = mysqli_connect($param->host , $param->user , $param->pass , $param->dbname , $param->port);

if(isset($_COOKIE['id']) and isset($_COOKIE['hash'])){
    $query = mysql_query($db , "SELECT * FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
    $userdata = mysqli_fetch_assoc($query);
    
    if(($userdata['uset_hash'] !== $_COOKIE['hash']) or ($userdata['id'] != $_COOKIE['id'])){
        setcookie("id", "", time() - 3600*24*30*12, "/");
        setcookie("hash", "", time() - 3600*24*30*12, "/");
        print "Error";
    }
 else {
        $_SESSION['user'] = $userdata;
        print "Hello, ".$_SESSION['user']->name.". All work";
    }
}
 else {
    print "Включіть кукі";
}

