<?php
session_start();
//include_once 'form.php';

$login = "AdminRules";
$password = 1111;

if(! empty($_GET) && isset($_GET['login']) && isset($_GET['password']))
{
    
    
    $log = $_SESSION['userLogin'];
    $pass = $_SESSION['userPassword'];
    print $log;
    print $pass;
    
    
    if($log == $login && $pass == $password)
    {
        header("location:http://test4.com:81/home/res.php");
    }
    else
    {
        header("location:http://test4.com:81/home/form.php");
    }
}



