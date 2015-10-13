<?php
session_start();
include_once 'session_menu.php';

$_SESSION['lastTime'] = time();
if(! empty($_POST) && isset($_POST['data']))
{
    $_SESSION['userData'] = $_POST['data'];
    header("location:http://test4.com:81/session_test.php");
}
    
?>
<form action="" method="post">
    <input type="text" name="data"/>   
    <input type="submit" name="send"/>
</form>
<?


