<?php

class UserModel extends Model{
    
    private $salt = "frgthbrhyhy656y5h6";
            
    function __construct() {
        parent::__construct("users");
    }
    
    function create($data){
        $data['pass'] = $this->hash_data($data['pass']);
        return parent::create($data);
    }
    function checkLogin($login , $pass){
        $sql = "SELECT id FROM {$this->table} WHERE login = ? AND pass = ?;";
        $data = [$login, $this->hash_data($pass)];
        $res = $this->db->select($sql, $data);
        return count($res) > 0 ? $res[0]->id : false;
    
    }
    function checkMatch($login){
        $sql = "SELECT id FROM {$this->table} WHERE login = ?;";
        $data = [$login];
        $res = $this->db->select($sql, $data);
        return count($res) > 0 ? $res[0]->id : false;
    }
            function hash_data($str){
        return hash('sha512' , ($str . $this->salt));
    }
   
}

