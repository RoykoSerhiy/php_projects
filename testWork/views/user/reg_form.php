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
    <div>Name<br/><input type="" name="name"/></div>
    <div <?=($error && $_GET['error'] == "novalid_login_or_pass" ? 'class = "error"' :'')?> style="<?=$style ?>">Login<input type="" name="login"/></div>
    <div <?=($error && $_GET['error'] == "novalid_login_or_pass" ? 'class = "error"' :'')?> style="<?=$style ?>">Password<input type="password" name="pass"/></div>
    <div <?=($error && $_GET['error'] == "empty_pass2" ? 'class = "error"' :'')?> style="<?=$style ?>">Reply password<input type="password" name="pass2"/></div>
    <div><input type="submit" value="Add User"/></div>
</form>
