<?php
require_once 'common.php';

$text = 'vasyapupkin@gmail.com';
$regex = '#[0-9a-zA-z\-\.]+@([\w\-]+\.){1,3}[a-z]{2,4}#';
if(preg_match($regex, $text))
{
    p("Valid");
}
 else {
    p("No valid");
 }