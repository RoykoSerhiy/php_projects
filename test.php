<?php
require_once 'common.php';

$host = $_SERVER['HTTP_HOST'];
p($host);

/*$data = ['title'=>'abra cadabra' , 'content'=>'hahaha','user_id'=>20];
           
$keys = array_keys($data);
$values = array_values($data);
$str = "";
for($i = 0;$i<count($values);$i++){
       $str .= "`".$keys[$i]."`"."= ?,";
              
}  
$str = substr($str, 0 , -1);
$values[] = 1;
$sql = "UPDATE `table` SET $str WHERE id = ?";
//p(count($values));
 p($str);
 p($sql);
            pr($keys);
            pr($values);*/

