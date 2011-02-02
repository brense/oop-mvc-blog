<?php

class int extends DataType {
	
	public function set($value){
		if(is_int($value)){
			$this->_value = (string)$value;		 
		}
		else {
			$this->_value = '"'.$value.'" is not an integer';
		}
	}
	
	public function __toString(){
		return $this->_value;
	}
}