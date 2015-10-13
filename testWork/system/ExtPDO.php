<?php

class extPDO extends PDO{
	private $lastQueryStatus = false;
	function query($sql, $params = array()){
            
		$stat = $this->prepare($sql);
		$this->lastQueryStatus = $stat->execute($params);
		return $stat; 
	}
	
	function select($sql, $params = array()){
		$res = $this->query($sql, $params);
		if($this->lastQueryStatus)
			return $res->fetchAll(PDO::FETCH_CLASS);
		return [];
	}
	
	function insert($sql, $params = array()){
		$res = $this->query($sql, $params);
		if($this->lastQueryStatus){
			return $this->lastInsertId();
		}
		return null;
	}
	
	function update($sql, $params = array()){
		$res = $this->query($sql, $params);
		if($this->lastQueryStatus)
			return $res->rowCount();
		return 0;
	}
	
	function delete($sql, $params = array()){
		return $this->update($sql, $params);
	}
	
	function parent_query($a, $b=null, $c=null){
		return parent::query($a, $b, $c);
	}
}


