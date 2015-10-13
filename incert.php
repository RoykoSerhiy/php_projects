<?php

include 'connect.php';
require_once 'common.php';

if(empty($_POST)){
    die("incorrect request");
}

function post($key){
    return isset($_POST[$key]) ? $_POST[$key]: NULL;
}

$name = post('name');
$login = post('login');
$email = post('email');
$age = intval(post('age'));
$pass = post('pass');
$gender = post('gender');

if($name == '' ||
        $login == ''
        || $email == ''){
    die("incorect empty values!!!");
}
if($gender != 'female'){
    $gender = 'male';
}

$sql = "INSERT INTO `users` (`name`,`login`,`pass`,`age`,`email`,`gender`) "
        . "VALUES ('$name','$login','$pass',$age,'$email',$gender);";
p($sql);
$db->query($sql);



//header("location: http://test4.com:81/dbTest.php");