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
            print("<a href='http://test4.com:81/mvc/auth/login'>back to login</a>");
            exit;
        }
        $user = $model->read($id);
        
        $_SESSION['user'] = $user;
        //cookie
        $userKey = $model->hash_data(mt_rand(100000 , 999999) . time());
        setcookie('user_key' ,$userKey,  time()+3600*24*30 );
        
        p("<h3>Hello <h1>{$user->name}</h1> your id: {$id}</h3>");
        $model->db()->update("UPDATE users SET" , [$userKey , $id]);
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
        $age = z::post('age');
        $email = z::post('email');
        $gender = z::post('gender');
        $userKey = $model->hash_data(mt_rand(100000 , 999999) . time());
        $id = $model->checkMatch($login);
        
        if($id){
            print("this login already exist ");
            print("<a href='http://test4.com:81/mvc/auth/register'>back to registration</a>");
            exit;
        }
        $data = ['name' => $name , 'login'=>$login , 'pass'=>$pass , 'age'=>$age , 'email'=>$email , 'gender'=>$gender , 'userKey'=>$userKey];
        //pr($data);
        $model->create($data);
        p("user with name:{$name} and login {$login} created");
    }
}

