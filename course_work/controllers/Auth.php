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
            print("<a href='http://test4.com:81/course_work/auth/login'>back to login</a>");
            exit;
        }
        $user = $model->read($id);
        
        $_SESSION['user'] = $user;
        //cookie
        $userKey = $model->hash_data(mt_rand(100000 , 999999) . time());
        setcookie('user_key' ,$userKey,  time()+3600*24*30 );
        
        
        $model->db()->update("UPDATE users SET" , [$userKey , $id]);
        header("location:http://test4.com:81/course_work/article/selectArticle");
    }
    function logoutAction(){
        session_abort();
        header("location:http://test4.com:81/course_work/auth/login");
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
        $age = z::post('age');
        $email = z::post('email');
        $gender = z::post('gender');
        $userKey = $model->hash_data(mt_rand(100000 , 999999) . time());
        $id = $model->checkMatch($login);
       
        
        if($id){
            print("this login already exist ");
            print("<a href='http://test4.com:81/course_work/auth/register'>back to registration</a>");
            exit;
        }
        if($pass2 == ''){
            p(header("location:http://test4.com:81/course_work/auth/register?error=empty_pass2"));
            exit;
        }
        if(preg_match("/^[a-z0-9_-]{3 , 16}$/", $login) || (strlen($pass) > 6 && $pass == $pass2)){
                $data = ['name' => $name , 'login'=>$login , 'pass'=>$pass , 'age'=>$age , 'email'=>$email , 'gender'=>$gender , 'userKey'=>$userKey];
                //pr($data);
                $new_user_id = $model->create($data);
                $_SESSION['id'] = $new_user_id;
                setcookie('user_key' ,$userKey,  time()+3600*24*30 );
                //p("user with name:{$name} and login {$login} created");
                header("location:http://test4.com:81/course_work/article/selectArticle");
             }else{
            p(header("location:http://test4.com:81/course_work/auth/register?error=novalid_login_or_pass"));
            exit;
        }
       
    }
    function test(){
        Zed::view('user/readArticle')->render(true);
    }
    
}

