<?php
include 'CommonData.php';
class UserData extends CommonData{
    private $salt = 'ochen,ochen#krutoy#salt!!!!1111adyn';
            function __construct() {
        parent::__construct('users');
    }
    
    function check($login , $pass){
        $sql = "SELECT id FROM {$this->table} WHERE login = ? AND pass = ?;";
        $data = [$login, $this->hash_data($pass)];
        $res = $this->db->select($sql, $data);
        return count($res) > 0 ? $res[0]->id : false;
    }
    
    function create($data){
        $data['pass'] = $this->hash_data($data['pass']);
        return parent::create($data);
    }
    
    function hash_data($str){
        return hash('sha512' , ($str . $this->salt));
    }
}

