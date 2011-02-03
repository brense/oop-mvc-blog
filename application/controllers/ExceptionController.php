<?php

class controllers_ExceptionController {
	
	private $_error;
	
	public function __construct($e){
		$this->_error = $e;
	}
	
	public function returnError(){
		$cfg = @models_Config::getInstance();
		$debug = $cfg->get('debug');
		if($debug == 'on'){
			echo '<pre>';
			echo 'Caught Error' . "\n";
			echo 'message: ' . $this->_error->getMessage() . "\n";
			echo 'in file: ' . $this->_error->getFile() . "\n";
			echo 'on line: ' . $this->_error->getLine() . "\n";
			echo '</pre>';
		}
		else {
			echo '<pre>';
			echo 'something went wrong';
			echo '</pre>';
		}
	}
	
}