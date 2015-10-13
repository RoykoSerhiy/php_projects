<?php
class BuisnesController{
 function buisnes(){
       Zed::view('main' , ['content' => Zed::view('user/addBuisnes')->render(),
           'title'=>'Add New'])->render(true);
    }
    function printBuisnes($list){
        
        Zed::view('user/profile', ['buisneses' => $list])->render(true);
     
    }
    
    function addBuisnes(){
        $model = Zed::model('buisnes');
        $title = z::post('title');
        $description = z::post('description');
        $date = z::post('date');
        if($title == "" || $description == "" || $date == "")
        {
            Zed::view('main' , ['content' => Zed::view('user/addBuisnes')->render(),
           'title'=>'Add New'])->render(true);
           
        }
        else
        {
            $isExecute = false;
            $user = $_SESSION['user'];
            if($user == NULL){
                p("User not exist!!!");
            }
            else{
                  $user_id = $user->id; 
            }
            $insertData = [
                'UserId' => $user_id,
                'Title' => $title,
                'Description' => $description,
                'scheduled_date' => $date,
                'isExecute' => $isExecute,
            ];
        
            $model->create($insertData);
            header("location:http://".HOST."/testWork/buisnes/selectBuisnes");
        }
    }
    
    function read($id){
       
        $model = Zed::model('buisnes');
        $data = $model->read($id);
        
        Zed::view('user/readBuisnes', ['buisneses' => $data])->render(true);
    }
    function deleteAction($id){
        $user = $_SESSION['user'];
        $userid = $user->id;
        $model = Zed::model('buisnes');
         $data = $model->read($id);
        if($userid == $data->UserId){
            $model->delete($id);
            header("location:http://".HOST."/testWork/buisnes/selectBuisnes");
        }
        else{
            header("location:http://".HOST."/testWork/auth/login");
        }
    }
    
    function actionUpdate(){
        $model = Zed::model('buisnes');
        $isExecute = z::post('chkExecute');
        $id = z::post('buisnes_id');
        $varible = null;
        if($isExecute == "on")
        {
            $varible = 1;
        }
        else
            if($isExecute == "off")
            {
                $varible = 0;
            }
        $data = [
                    'isExecute' => $varible, 
                ];
        $res = $model->update($data , $id);
        
        header("location:http://".HOST."/testWork/buisnes/selectBuisnes");
    }
    function selectBuisnes(){
        
        $model = Zed::model('buisnes');
        $user = $_SESSION['user'];
        $userId = $user->id;
        if(isset($_GET['orderBy'])){
            $list = $model->readBuisnes($userId , $_GET['orderBy']);
            $this->printBuisnes($list);
           
        }
        else{
            $list = $model->readBuisnes($userId , "date_created");
            $this->printBuisnes($list);
            
        }
        
        
    }
    function sBuisnes(){
        $model = Zed::model('buisnes');
        $text = Zed::post('inputName');
        $user = $_SESSION['user'];
        $userId = $user->id;
        $list = $model->searchBuisnes($userId , $text);
            $this->printBuisnes($list);
    }
    function deleteAcc()
    {
        $model = Zed::model('buisnes');
        $userId = $_SESSION['user']->id;
        $model->deleteBuisnes($userId);
        header("location:http://".HOST."/testWork/auth/delAccAction");
    }
}