<?php

class int extends DataType {
	
	public function set($value){
		if(is_int($value)){
			$this->_value = (string)$value;		 
		}
		else {
			throw new Exception($value . ' is not a integer');
		}
	}
	
	public function __toString(){
		return $this->_value;
	}
}