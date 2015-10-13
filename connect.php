<?php

$param = (object)[
  'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'php3_test',
    'user' => 'root',
    'pass' => ''
];

$db = mysqli_connect($param->host , $param->user , $param->pass , $param->dbname , $param->port);

if(! $db){
    die("No connection");
}

