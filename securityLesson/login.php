<?php


include '../common.php';
include 'userData.php';

function post($x){
    return isset($_POST[$x]) ? $_POST[$x] :null;
}

$model = new UserData();

if(empty($_POST)){
    die("incorect login or password");
}
$login = post('login');
$pass = post('pass');



$id = $model->check($login, $pass);
if(! $id){
    die('Ti mne vtiraesh kakuy to dich');
}

$user = $model->read($id);
//print '<pre>';
//print_r($user);
?>
<div class="user">
	<div>Name: <?=$user->name?></div>
	<div>Login: <?=$user->login?></div>
	<div>Password: <?=$user->pass?></div>
	<div>Email: <?=$user->email?></div>
</div>