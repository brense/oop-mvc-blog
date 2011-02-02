<?php

class controllers_db_PdoController {
	
	private $_handle;
	private $_query;
	
	public function __contruct(){
		
	}
	
	public function connect($dbhost, $dbname, $dbuser, $dbpswd){
		$this->_handle = new PDO("mysql:host=" . $dbhost . ";dbname=" . $dbname, $dbuser, $dbpswd);
		return $this->_handle;
	}
	
	public function query($query, $params = NULL){
		$this->_query = $this->_handle->prepare($query);
		if(is_array($params)){
			foreach($params as $key => $value){
				$this->_query->bindValue($key, $value);
			}
		}
		$this->_query->execute();
		return $this->_query;
	}
	
	public function create($table, $values){
		foreach($values as $key => $value){
			$cols[] = $key;
			$vals[] = ':' . $key;
			$query['params'][':' . $key] = $value;
		}
		$cols = implode(', ', $cols);
		$vals = implode(', ', $vals);
		$query['query'] = "INSERT INTO " . $table . " (".$cols.") VALUES(".$vals.")";
		return $query;
	}
	
	public function read($table, $crits = NULL, $sort = NULL, $limit = NULL){
		if(isset($sort)) $sort = ' ' . $sort;
		if(isset($limit)) $limit = ' ' . $limit;
		if(isset($crits)){
			foreach($crits as $field => $value){
				$criteria .= $field . ' = :crit' . $field;
				$query['params'][':crit' . $field] = $value;
			}
		}
		if(isset($criteria)){
			$criteria = ' WHERE ' . $criteria;
		}
		$query['query'] = "SELECT * FROM " . $table . $criteria . $sort . $limit;
		return $query;
	}
	
	public function update($table, $crits, $values){
		foreach($values as $key => $value){
			$cols[] = $key . '=:' . $key;
			$query['params'][':' . $key] = $value;
		}
		$cols = implode(', ', $cols);
		foreach($crits as $field => $value){
			$criteria .= $field . ' = :crit' . $field;
			$query['params'][':crit' . $field] = $value;
		}
		if(isset($criteria)){
			$criteria = ' WHERE ' . $criteria;
		}
		$query['query'] = "UPDATE " . $table . " SET " . $cols . $criteria;
		return $query;
	}
	
	public function delete($table, $crits){
		foreach($crits as $field => $value){
			$criteria .= $field . ' = :crit' . $field;
			$query['params'][':crit' . $field] = $value;
		}
		if(isset($criteria)){
			$criteria = ' WHERE ' . $criteria;
		}
		$query['query'] = "DELETE FROM " . $table . ' ' . $criteria;
		return $query;
	}
	
	public function getLastInsertId(){
		return $this->_handle->lastInsertId();
	}
	
	public function fetchAll(){
		return $this->_query->fetchAll();
	}
	
}