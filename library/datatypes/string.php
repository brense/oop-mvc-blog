<?php

class string extends DataType {
	
	public function set($value){
		if(is_string($value)){
			$this->_value = (string)$value;		 
		}
		else {
			$this->_value = '"'.$value.'" is not a string';
		}
	}
	
	public function __toString(){
		return $this->_value;
	}
}