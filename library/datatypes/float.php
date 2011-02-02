<?php

class float extends DataType {
	
	public function set($value){
		if(is_float($value)){
			$this->_value = (string)$value;		 
		}
		else {
			$this->_value = '"'.$value.'" is not a float';
		}
	}
	
	public function __toString(){
		return $this->_value;
	}
	
}