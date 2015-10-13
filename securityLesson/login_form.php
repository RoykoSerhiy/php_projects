<html>
<head>
	<style>
		div.user{
			margin: 5px;
			border: 1px solid #eee;
		}
		div.user div {
			margin: 2px;
		}
	</style>
</head>
<body>
    <form action="login.php" method="post"> 
		<input type="" name="login"> Login
		<input type="" name="pass">Password
		<input type="submit" value="log in">
	</form>
	<?php if(isset($user)):?>
		<div class="user">
			<div>Name: <?=$user['name']?></div>
			<div>Login: <?=$user['login']?></div>
			<div>Password: <?=$user['pass']?></div>
			<div>Email: <?=$user['email']?></div>
		</div>
	<?php endif?>
</body>
</html>



