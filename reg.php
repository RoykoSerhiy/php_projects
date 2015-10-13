<?php


function post($key){
    return isset($_POST[$key]) ? $_POST[$key]: NULL;
}

$dbuser = 'root';
$dbpass = '';
$db = new PDO('mysql:dbname=php3_test;host=localhost',$dbuser,$dbpass);

if(!empty($_POST)){
    $name = post('name');
$login = post('login');
$email = post('email');
$age = intval(post('age'));
$pass = post('pass');
$gender = post('gender');

if($name == '' ||
        $login == ''
        || $email == ''){
    die("incorect empty values!!!");
}
if($gender != 'female'){
    $gender = 'male';
}


$sql = "INSERT INTO `users` (`name`,`login`,`pass`,`age`,`email`,`gender`) VALUES (:name,:login,:pass,:age,:email,:gender);";
$assocStat = $db->prepare($sql);        
$assocStat->bindParam(':name', $name);
$assocStat->bindParam(':login', $login);
$assocStat->bindParam(':pass', $pass);
$assocStat->bindParam(':age', $age);
$assocStat->bindParam(':email', $email);
$assocStat->bindParam(':gender', $gender);
$assocStat->execute();
}


?>
<form action="" method="post">
    <div><input type="" name="name"/>Name</div>
    <div><input type="" name="login"/>Login</div>
    <div><input type="password" name="pass"/>Password</div>
    <div><input type="" name="age"/>Age</div>
    <div><input type="" name="email"/>Email</div>
    <div><input type="" name="gender" value="male"/>Gender</div>
    <div><input type="submit" value="Add User"/></div>
</form>
<?

