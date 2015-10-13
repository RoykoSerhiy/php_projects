<?php



$name = 'importantData';

if(isset($_COOKIE[$name]))
{
    print "<div>Tssss... {$_COOKIE[$name]}</div>";
    print "<a href='?clear=1'>clear cookies</a>";
}
if(isset($_GET['clear']))
{
    //kill cookie
    setcookie($name , '' , 1);
}else{
    $value = "secret code of Pentagon!!!: " . time();
$expired = time() + 60*2;
setcookie($name , $value , $expired);
}


