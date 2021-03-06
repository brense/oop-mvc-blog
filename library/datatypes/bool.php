<?php

class bool extends DataType {
	
	public function set($value){
		if(is_bool($value)){
			$this->_value = (string)$value;		 
		}
		else {
			throw new Exception($value . ' is not a boolean');
		}
	}
	
	public function __toString(){
		return $this->_value;
	}
}