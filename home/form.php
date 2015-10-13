<?php
session_start();

if(! empty($_POST) && isset($_POST['login']) && isset($_POST['password']))
{
    $_SESSION['userLogin'] = $_POST['login'];
    $_SESSION['userPassword'] = $_POST['password'];
    header("location:http://test4.com:81/home/checkData.php");
}

?>
<form action="" method="post">
    <input type="text" name="login"/>   
    <input type="password" name="password"/> 
    <input type="submit" name="send"/>
</form>
<?
