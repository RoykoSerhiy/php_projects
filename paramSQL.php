<?php

include_once 'common.php';

$dbuser = 'root';
$dbpass = '';
$db = new PDO('mysql:dbname=php3_test;host=localhost',$dbuser,$dbpass);

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$res = $db->query("SELECT * FROM users LIMIT $offset , $limit;");
function  tr($fields,$row){
    $html = '<tr>';
    foreach ($fields as $key) {
        $html .= "<td>{$row[$key]}</td>";
    }
    $html .= "</tr>";
    return $html;
}
$fields = ['id','name' , 'email' , 'gender' , 'age'];
$table = "<table>\n";
foreach ($res->fetchAll() as $row) {
    $table .= tr($fields,$row);
}
$table .= "</table>";
print '<style type="text/css">table , td{border: 1px solid gray;}</style>';
p($table);
//paginator***************************
$res = $db->query("SELECT COUNT(id) FROM users");
$number = $res->fetchColumn();

$perPage = 10;
$pageNum = ceil($number / $perPage);
//p($pageNum);

$menu = "";
for($i = 1;$i<=$pageNum;$i++){
    $menu .= "<a href='?page=$i'>$i</a> | ";
}
p($menu);