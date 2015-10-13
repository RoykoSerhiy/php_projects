<?php

class ArticleController{
    
    function article(){
       Zed::view('main' , ['content' => Zed::view('user/addArticle')->render(),
           'title'=>'Add Post'])->render(true);
    }
    function printArticle($list){
        Zed::view('user/article_list', ['articles' => $list])->render(true);
     //   Zed::view('main' , ['content' => $content])->render(true);
    }
    
    function addArticle(){
        $model = Zed::model('post');
        $title = z::post('title');
        $content = z::post('content');
        $date_created = "CURRENT_TIMESTUMP";
        $user = $_SESSION['user'];
        if($user == NULL){
            p("User not exist!!!");
        }
        else{
              $user_id = $user->id; 
        }
        $insertData = [
            'title' => $title,
            'content' => $content,
            //'date_created' => $date_created,
            'user_id' => $user_id,
        ];
       // pr($insertData);
        $model->create($insertData);
        header("location:http://test4.com:81/course_work/article/selectArticle");
    }
    function read($id){
       
        $model = Zed::model('post');
        $data = $model->read($id);
        //var_dump($data);
        Zed::view('user/readArticle', ['articles' => $data])->render(true);
    }
    function readAll(){
       
        $model = Zed::model('post');
        $data = $model->all();
        //pr($data);
        Zed::view('user/allArticles', ['articles' => $data])->render(true);
    }
    function update($id){
        $model = Zed::model('post');
        $user = $_SESSION['user'];
        $userid = $user->id;
        
        $data = $model->read($id);
        if($data && $userid == $data->user_id)
        {
            Zed::view('user/redactArticle', ['article' => $data])->render(true);
        }
        else {
            header("location:http://test4.com:81/course_work/auth/login");
        }
        
    }
    function actionUpdate(){
        $model = Zed::model('post');
        $title = z::post('title');
        $content = z::post('content');
        $id = z::post('article_id');
        $data = [
                    'title'=>$title,
                    'content'=>$content,
                ];
        $res = $model->update($data , $id);
        //p("result of update: " . $res);
         header("location:http://test4.com:81/course_work/article/selectArticle");
    }
    function deleteAction($id){
        $user = $_SESSION['user'];
        $userid = $user->id;
        $model = Zed::model('post');
         $data = $model->read($id);
        if($userid == $data->user_id){
            $model->delete($id);
            header("location:http://test4.com:81/course_work/article/selectArticle");
        }
        else{
            header("location:http://test4.com:81/course_work/auth/login");
        }
    }
    function selectArticle(){
        $model = Zed::model('post');
        $user = $_SESSION['user'];
        $userId = $user->id;
        $list = $model->readArticle($userId);
        
            //pr($list);
            $this->printArticle($list);
        
    }
    
}

