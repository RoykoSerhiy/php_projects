<?php

class TestController{
    function index(){}
    
    function anonym_model(){
        $model = new Model("users");
        $users = $model->db()->select("select name, email, id from users where age > ? ;" , [30]);
        //print_r($users);
    }
    function simple_query(){
        $model = z::model('user');
        $users = $model->all(10 , 20);
    }
      function create_user($login , $pass , $email,$age,$gender){
        $name = ucfirst($login);
        $id = Zed::model('user')->create([
            'name'=>$name,
            'login'=>$login,
            'pass'=>$pass,
            'age'=>$age,
            'email'=>$email,
                'gender'=>$gender
        ]);
        p("Created user: " . $id);
    } 
    
}
