<?php
include_once 'common.php';
$dbuser = 'root';
$dbpass = '';
$db = new PDO('mysql:dbname=php3_test;host=localhost',$dbuser,$dbpass);
$login = '';
$password = '';
if(! empty($_POST) && isset($_POST['login']) && isset($_POST['password']))
{
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE login = :login AND pass = :password;";
    $assocStat = $db->prepare($sql);
    $assocStat->bindParam(':login', $login);
    $assocStat->bindParam(':password', $password);
    $res = $assocStat->execute();
    $data = $assocStat->fetchAll();
    pr($data);
}else
{
    p("in get arr error");
}

?>
<form action="" method="post">
    <input type="text" name="login"/>   
    <input type="password" name="password"/> 
    <input type="submit" name="send"/>
    <a href="reg.php">registration</a>
</form>
<?

