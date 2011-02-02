<?php

abstract class DataType {
	
	private $_value;
	
	public function __construct($value){
		$this->set($value);
	}
	
	public function set($value){
		
	}
	
	public function __toString(){
		return $this->_value;
	}
	
}