<?php
include '../common.php';
$zip = new ZipArchive();

if(!$zip->open("pages.zip")){
    die("cant open zip");
}
$num = $zip->numFiles;
if($num > 0){

$stat = $zip->statIndex(0);
$fileName = $stat['name'];
$html = $zip->getFromName($fileName);

p($html);
}