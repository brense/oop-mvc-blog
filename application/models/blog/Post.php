<?php

class models_blog_Pot extends models_Observable {
	
	private $_id;
	private $_title;
	private $_description;
	private $_rules;
	private $_date;
	private $_owner;
	private $_status;
	
	protected $_history = array();
	
	public function __construct(){
		
	}
	
	public function getInstance(){
		return $this;
	}
	
	public function set($name,$value){
		switch($name){
			case 'id': 			$this->_id = $value; break;
			case 'title': 		$this->_title = $value; break;
			case 'description': $this->_description = $value; break;
			case 'rules': 		$this->_rules = $value; break;
			case 'date': 		$this->_date = $value; break;
			case 'owner': 		$this->_owner = $value; break;
			case 'status': 		$this->_status = $value; break;
		}
	}
	
	public function get($name){
		switch($name){
			case 'id': 			return $this->_id; break;
			case 'title': 		return $this->_title; break;
			case 'description': return $this->_description; break;
			case 'rules': 		return $this->_rules; break;
			case 'date': 		return $this->_date; break;
			case 'owner': 		return $this->_owner; break;
			case 'status': 		return $this->_status; break;
		}
	}
	
}