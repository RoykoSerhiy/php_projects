<?php
include_once 'common.php';
$dbuser = 'root';
$dbpass = '';
$db = new PDO('mysql:dbname=php3_test;host=localhost',$dbuser,$dbpass);
$res = $db->query("SELECT MAX(id) FROM users");
$number = $res->fetchColumn();
//p($number);exit;
$sql = "INSERT INTO users (`name`,`login`,`pass`,`age`,`email`,`gender`) VALUES (?,?,?,?,?,?);";
$query = $db->prepare($sql);

for($i = $number + 1;$i<=$number + 100;++$i){
  $userdata = [
   "UserMykola".$i,
      "User_m_".$i,
      "pass".$i,
      mt_rand(15, 60),
      "mykola_$i@mymail.com",
      "male"
  ];
  $query->execute($userdata);
}

