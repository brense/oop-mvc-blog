<?php

class float extends DataType {
	
	public function set($value){
		if(is_float($value)){
			$this->_value = (string)$value;		 
		}
		else {
			throw new Exception($value . ' is not a float');
		}
	}
	
	public function __toString(){
		return $this->_value;
	}
	
}