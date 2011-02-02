<?php

abstract class models_mappers_AbstractMapper {
	
	protected $_object;
	protected $_array;
	protected $_handle;
	
	public function __construct(){
		$this->_handle = new controllers_DbController($this->_table);
	}
	
	public function __destruct(){
		unset($this->_handle);
	}
	
	protected function save($action = NULL, $crits = NULL){
		if(isset($this->_array['id'])){
			$action = 'update';
			$crits = array('id' => $this->_array['id']);
		}
		
		switch($action){
			case 'update':
				$this->_handle->update($crits, $this->_array);
			break;
			default:
				// returns last insterted id
				return $this->_handle->create($this->_array);
			break;
		}
	}
	
	public function dropTable(){
		$query = "DROP TABLE " . $this->_table;
		$this->_handle->execute($query);
	}
	
	public function emptyTable(){
		$query = "TRUNCATE TABLE " . $this->_table;
		$this->_handle->execute($query);
	}
	
	protected function toObject($array, $object){
		if(!empty($array)){
        	foreach($array as $key => $value){
            	$object->{$key} = $value;
        	}
        	return $object;
    	}
    	return false;
	}
	
	protected function toArray($object){
		$type = strlen(get_class($object))+3;
		$object = (array)$object;
		foreach($object as $key => $value){
			if(substr($key, $type) != 'bservers' && substr($key, $type) != '0'){
				$array[substr($key, $type)] = $value;
			}
		}
    	return $array;
	}
	
}