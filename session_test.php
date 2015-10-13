<?php
session_start();
include_once 'session_menu.php';

if(isset($_SESSION['lastTime'])){
    $currentTime = time();
    print "cur: $currentTime, last: {$_SESSION['lastTime']}";
    
}
if(isset($_SESSION['userData'])){
    print "<div>{$_SESSION['userData']}</div>";
}


