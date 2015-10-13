<?php
function generateCode($lenth=6){
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $charLen = strlen($chars) - 1;
    while (strlen($code) < $lenth){
        $code .= $chars[mt_rand(0, $charLen)];
    }
    return $code;
}
$param = (object)[
  'host' => 'localhost',
    'port' => 3306,
    'dbname' => 'testwork',
    'user' => 'root',
    'pass' => ''
];

$db = mysqli_connect($param->host , $param->user , $param->pass , $param->dbname , $param->port);
if(isset($_POST['submit'])){
    //$res = mysqli_query($db,"SELECT id,name,login,pass FROM `users` WHERE login='".mysqli_real_escape_string($db , $_POST['login'])." LIMIT 1");
    $res = mysqli_query($db,"SELECT * FROM users WHERE login=k123456");
    $data = mysqli_fetch_assoc($res); 
    if($data['pass'] === $_POST['password'])
    {
        $hash = md5(generateCode(10));
        mysqli_query($db , "UPDATE users SET user_hash='".$hash." WHERE id='".$data['id']."'");
        setcookie("id" , $data['id'] , time()+60*60*24*30);
        setcookie("hash" , $hash,time()+60*60*24*30);
        header("location: check.php");
        exit();
    }
    else {
        print("Невірний логін/пароль");
    }
    
    
}
        
?>       
<form method="POST">
Логин <input name="login" type="text"><br>
Пароль <input name="password" type="password"><br>
<input name="submit" type="submit" value="Войти">
</form>
