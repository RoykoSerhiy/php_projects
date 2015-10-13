<?php
include_once 'ExtPDO.php';
class CommonData {
	
	protected $table;
	protected $db = null;
	
	public function __construct($table){
		$this->table = $table;
		$this->db = new ExtPDO('mysql:dbname=security;host=localhost', 'root', '');
	}
	
	public function create($data){
		$fields = array_keys($data);
		$fStr = '';
		foreach($fields as $field){
			$fStr .= "`$field`, ";
		}
		$fStr = substr($fStr, 0, -2);
		
		$values = array_values($data);
		$vStr = str_repeat('?, ', count($values));
		$vStr = substr($vStr, 0, -2);
		
		$sql = "INSERT INTO `{$this->table}` ($fStr) VALUES ($vStr); ";
		
		return $this->db->insert($sql, $values);
		
	}
	public function read($id){
            $sql = "SELECT * FROM `{$this->table}` WHERE `id` = ?;";
            $res = $this->db->select($sql , [$id]);
            return count($res) > 0 ? $res[0] : null;
        } 
}