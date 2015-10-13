<?php
    $style = "width: 175px; height: 40px;";
    //print $_GET['error'];
    $error = false;
    if(isset($_GET['error'])){
        $error = true;
        
    }
?>
<style>
    div.error {
        
        background-color: red;
    }
</style>
<form action="<?=BASE_URL?>/auth/registerAction" method="post">
    <div><input type="" name="name"/>Name</div>
    <div <?=($error && $_GET['error'] == "novalid_login_or_pass" ? 'class = "error"' :'')?> style="<?=$style ?>">Login<input type="" name="login"/></div>
    <div <?=($error && $_GET['error'] == "novalid_login_or_pass" ? 'class = "error"' :'')?> style="<?=$style ?>">Password<input type="password" name="pass"/></div>
    <div <?=($error && $_GET['error'] == "empty_pass2" ? 'class = "error"' :'')?> style="<?=$style ?>">Reply password<input type="password" name="pass2"/></div>
    <div><input type="" name="age"/>Age</div>
    <div><input type="" name="email"/>Email</div>
    <div><input type="" name="gender" value="male"/>Gender</div>
    <!--<div>Avatar<input type="file" name="imgfile" /></div>-->
    <div><input type="submit" value="Add User"/></div>
</form>
