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

$sql = "SELECT * FROM users LIMIT 0, 10";
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
//p($xml->asXML());
function printXml($simpleXml){
	$dom = dom_import_simplexml($simpleXml)->ownerDocument;
	$dom->formatOutput = true;
	p (htmlspecialchars($dom->saveXML()));
}
//printXml($xml);

$table = "";
$Users = $xml->xpath('//user'); 
foreach ($Users as $u){
    $atr = $u->attributes();
    $tr = "<tr>
        <td>{$atr->login}</td>
        <td>{$atr->pass}</td>
        <td>{$atr->age}</td>
        <td>{$atr->email}</td>
        <td>{$atr->gender}</td>
           </tr>";
        $table .= $tr;
}
$table="<table border=1>$table</table>";
p($table);