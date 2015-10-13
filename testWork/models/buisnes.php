<?php

class BuisnesModel extends Model{
    
    function __construct() {
        parent::__construct("dolist");
    }
    function create($data){
        return parent::create($data);
    }
    function readBuisnes($userId , $orderByField){
        $sql = "SELECT * FROM `{$this->table}` WHERE `UserId` = ? ORDER BY `$orderByField`;";
            $res = $this->db->select($sql , [$userId]);
            return $res;
    }
    function searchBuisnes($userId , $str)
    {
       $sql = "SELECT * FROM `{$this->table}` WHERE `UserId` = ? AND `Title` = ?;";
       $res = $this->db->select($sql , [$userId , $str]);
       return $res;
    }
    function deleteBuisnes($userId)
    {
       $sql = "DELETE FROM `{$this->table}` WHERE `UserId` = ?;";
       $res = $this->db->delete($sql , [$userId]);
       return res;
    }
    
   
}
