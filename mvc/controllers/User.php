<?php

class UserController {
    function __construct() {
        print ("<h1>User: $id</h1>");
    }
    
    function index(){}
    
    function view($id = null){
        $view = Zed::view('main' , ['title' => 'User\`s page' , 'content' => 'frfgvrtgtrg' . $id]);
        $view->menu = $this->menu();
        $view->render(TRUE);
    }
    function all(){
        
    }
    private function menu(){
        return[
            (object)['text'=>'Main' ,'link'=>  Router::base()],
              (object)['text'=>'Users' ,'link'=>  Router::base() . '/user/all'],
              (object)['text'=>'Articles' ,'link'=>  Router::base() . '/articles'],
              (object)['text'=>'News' ,'link'=>  Router::base() . '/news'],
              (object)['text'=>'About' ,'link'=>  Router::base() . '/project/info']
        ];
    }
} 

