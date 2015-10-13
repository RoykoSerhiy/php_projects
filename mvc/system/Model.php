<?php
include_once 'ExtPDO.php';
class Model{
    
    protected $table;
    protected $db = null;
    public function __construct($table){
        $this->table = $table;
        $this->db = new ExtPDO('mysql:dbname=php3_test;host=localhost' , 'root' , '');
    }
    public function create($data){
        $fields = array_keys($data);
        $fStr = '';
        foreach ($data as $field => $val) {
            $fStr .= "$field , ";
        }
        $fStr = substr($fStr, 0 , -2);
        $values = array_values($data);
        $vStr = str_repeat('?, ', count($values));//array_fill(0 , count($values) , '?, ');
        $vStr = substr($vStr, 0 , -2);
        
        $sql = "INSERT INTO `{$this->table}` ($fStr) VALUES ($vStr);";
        
        return  $this->db->insert($sql , $values);
    }
    public function read($id){
            $sql = "SELECT * FROM `{$this->table}` WHERE `id` = ?;";
            $res = $this->db->select($sql , [$id]);
            return count($res) > 0 ? $res[0] : null;
        } 
        public function all($offset = null, $limit = null){
            $limitStr = '';
            if($offset > -1 AND $limit > -1){
            $offset = intval($offset);
            $limit = intval($limit);
            $limitStr = "LIMIT $offset , $limit;";
            }
            
            $sql = "SELECT * FROM `{$this->table}` $limitStr ;";
                return $this->db->select($sql);
        }
        

        public function db(){
            return $this->db;
        }
}

