<?php

class blog_models_Post extends models_Observable {
	
	private $_id;
	private $_title;
	private $_message;
	private $_tags;
	private $_date;
	private $_status;
	
	private $_authors = array():
	
	protected $_history = array();
	
	public function __construct(){
		
	}
	
	public function getInstance(){
		return $this;
	}
	
	public function set($name, $value){
		switch($name){
			case 'id': 		$this->_id = $value; break;
			case 'title': 	$this->_title = $value; break;
			case 'message': $this->_message = $value; break;
			case 'tags': 	$this->_tags = $value; break;
			case 'date': 	$this->_date = $value; break;
			case 'status': 	$this->_status = $value; break;
			
			case 'author': 	$this->_authors[] = $value; break;
		}
	}
	
	public function get($name){
		switch($name){
			case 'id': 		return $this->_id; break;
			case 'title': 	return $this->_title; break;
			case 'message': return $this->_message; break;
			case 'tags': 	return $this->_tags; break;
			case 'date': 	return $this->_date; break;
			case 'status': 	return $this->_status; break;
			
			case 'authors': return $this->_authors; break;
		}
	}
	
}