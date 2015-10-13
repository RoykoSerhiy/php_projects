<?php
class AuthController{
    function login(){
       Zed::view('main' , ['content' => Zed::view('user/login_form')->render(),
           'title'=>'login page'])->render(true);
    }
    function loginAction(){
        $model = Zed::model('user');
        $login = z::post('login');
        $pass = z::post('pass');
        $id = $model->checkLogin($login , $pass);
        //p($id);
        if(!$id){
            print("no same user");
            print("<a href='http://".HOST."/testWork/auth/login'>back to login</a>");
            exit;
        }
        $user = $model->read($id);
        
        $_SESSION['user'] = $user;
        //cookie
        $userKey = $model->hash_data(mt_rand(100000 , 999999) . time());
        setcookie('user_key' ,$userKey,  time()+3600*24*30 );
        
        header("location:http://".HOST."/testWork/buisnes/selectBuisnes");
        
       
       
    }
    function logoutAction(){
        session_abort();
        header("location:http://".HOST."/testWork/auth/login");
    }
    function register(){
         Zed::view('main' , ['content' => Zed::view('user/reg_form')->render(),
           'title'=>'register page'])->render(true);
    }
    function registerAction(){
        $model = Zed::model('user');
        $name = z::post('name');
        $login = z::post('login');
        $pass = z::post('pass');
        $pass2 = z::post('pass2');
        
        $userKey = $model->hash_data(mt_rand(100000 , 999999) . time());
        $id = $model->checkMatch($login);
       
        
        if($id){
            print("this login already exist ");
            print("<a href='http://".HOST."/testWork/auth/register'>back to registration</a>");
            exit;
        }
        if($pass2 == ''){
            p(header("location:http://".HOST."/testWork/auth/register?error=empty_pass2"));
            exit;
        }
        if(preg_match("/^[a-z0-9_-]{3 , 16}$/", $login) || (strlen($pass) >= 6 && $pass == $pass2)){
            
                $data = ['name' => $name , 'login'=>$login , 'pass'=>$pass];
                
                $new_user_id = $model->create($data);
                
                $user = $model->read($new_user_id);
                $_SESSION['user'] = $user;
                setcookie('user_key' ,$userKey,  time()+3600*24*30 );
               
                header("location:http://".HOST."/testWork/buisnes/selectBuisnes");
             }else{
            print(header("location:http://".HOST."/testWork/auth/register?error=novalid_login_or_pass"));
            exit;
        }
       
    }
    function delAccAction()
    {
        $model = Zed::model('user');
        $login = $_SESSION['user']->login;
        $model->deleteUser($login);
        header("location:http://".HOST."/testWork/auth/login");
    }
    
    
}

