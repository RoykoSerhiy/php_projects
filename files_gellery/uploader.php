<?php
include_once '../common.php';
//$_FILES;
define('IMAGE_DIR', __DIR__ . "/img");
pr($_FILES);

if(!is_uploaded_file($_FILES['file_input']['tmp_name']))
{
    die("No file, looser"); 
}
$fileInfo = $_FILES['file_input'];
$timeFlag = time() . "_";
$fileName = $timeFlag . $fileInfo['name'];
$savePath = IMAGE_DIR . '/' . $fileName; 


$copySuccsed = move_uploaded_file($fileInfo['tmp_name'] , $savePath);

if(! $copySuccsed){
    die("Can`t copy uploaded file!");
}
print "Uploaded";
header('location:http://test4.com:81/files_gellery/gallery.php');
