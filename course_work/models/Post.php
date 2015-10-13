<?php

class PostModel extends Model{
    
    function __construct() {
        parent::__construct("articles");
    }
    function create($data){
        return parent::create($data);
    }
    function readArticle($userId){
        $sql = "SELECT * FROM `{$this->table}` WHERE `user_id` = ?;";
            $res = $this->db->select($sql , [$userId]);
            return $res;
    }
    
    function all(){
         $sql = "SELECT u.id as uid, u.name, a.id as id, a.title, a.content, a.date_created as date FROM users u 
                INNER JOIN articles a ON a.user_id = u.id";
        
        return $this->db->select($sql);
    }
    
   
}
