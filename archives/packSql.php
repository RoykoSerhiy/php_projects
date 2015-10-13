<?php
include '../common.php';
$string = <<<XML
<?xml version='1.0'?> 
    <data>
    </data>
XML;
$xml = simplexml_load_string($string);
$dbuser = 'root';
$dbpass = '';
$db = new PDO('mysql:dbname=php3_test;host=localhost',$dbuser,$dbpass);

$sql = "SELECT * FROM users ;";
$res = $db->query($sql);
$rows = $res->fetchAll();
//pr($rows);
$users = $xml->addChild('users');
foreach ($rows as $i => $row) {
    $user = $users->addChild('user');
    $user->addAttribute('login',$row['login']);
    $user->addAttribute('password',$row['pass']);
    $user->addAttribute('age',$row['age']);
    $user->addAttribute('email',$row['email']);
    $user->addAttribute('gender',$row['gender']);
}

$dom = dom_import_simplexml($xml)->ownerDocument;
$dom->formatOutput = true;
$formatedXml = $dom->saveXML();

$zip = new ZipArchive();
if(! $zip->open("C:\\\\users.xml.zip" , ZIPARCHIVE::CREATE)){
    die("Cant open Zip");
}
//var_dump($zip);
//phpinfo();
//file_put_contents("C:\\\\1.txt", "string");
$zip->addFromString("users.xml",$formatedXml);
$zip->close();
