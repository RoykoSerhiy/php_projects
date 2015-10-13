<?php
function toTexts($file = '')
{
    header('location:http://test4.com:81/texts.php?file=' . $file);
}
function post($name){
    return isset($_POST[$name])? $_POST[$name]: null;
}
define('TEXT_DIR' , __DIR__ . '/textFiles');
if(empty($_POST)){
    toTexts();
}

$text = $_POST['text'];
$fileName = $_POST['filename'];
if(empty($fileName)){
    $fileName = strval(time()) . '.txt';
}

file_put_contents(TEXT_DIR . '/' . $fileName , $text);

toTexts($fileName);