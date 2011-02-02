<?php

class controllers_DbController {
	
	private $_handle;
	private $_query;
	private $_table;
	private $_db;
	
	public function __construct($table){
		$cfg = models_Config::getInstance();
		$this->_table = $cfg->get('dbprfx') . $table;
		switch($cfg->get('dbtype')){
			case 'pdo': 	$this->_db = new controllers_db_PdoController(); break;
			case 'mysqli': 	$this->_db = new controllers_db_MysqliController(); break;
			case 'mysql': 	$this->_db = new controllers_db_MysqlController(); break;
		}
		$this->_handle = $this->_db->connect($cfg->get('dbhost'), $cfg->get('dbname'), $cfg->get('dbuser'), $cfg->get('dbpswd'));
	}
	
	public function __destruct(){
		unset($this->_handle);
	}
		
	public function execute($query, $params = NULL, $return = NULL){
		$this->_query = $this->_db->query($query, $params);
		if(isset($return)){
			switch($return){
				case 'fetchAll': 		return $this->_db->fetchAll(); break;
				case 'lastInsertId': 	return $this->_db->getLastInsertId(); break;
			}
		}
	}
	
	public function create($values){
		$query = $this->_db->create($this->_table, $values);
		$this->_query = $this->_db->query($query['query'], $query['params']);
		return $this->_db->getLastInsertId();
	}
	
	public function read($crits = NULL, $sort = NULL, $limit = NULL){
		$query = $this->_db->read($this->_table, $crits, $sort, $limit);
		$this->_query = $this->_db->query($query['query'], $query['params']);
		return $this->_db->fetchAll();
	}
	
	public function update($crits, $values){
		$query = $this->_db->update($this->_table, $crits, $values);
		$this->_query = $this->_db->query($query['query'], $query['params']);
	}
	
	public function delete($crits){
		$query = $this->_db->delete($this->_table, $crits);
		$this->_query = $this->_db->query($query['query'], $query['params']);
	}
	
}