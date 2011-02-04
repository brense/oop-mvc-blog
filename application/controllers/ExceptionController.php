<?php

class controllers_ExceptionController {
	
	private $_error;
	private $_log;
	
	public function __construct($e){
		$this->_error = $e;
	}
	
	private function handleError(){
		$this->_log['message'] = $this->_error->getMessage();
		$this->_log['file'] = $this->_error->getFile();
		$this->_log['line'] = $this->_error->getLine();
		
		// save to error log
		$handle = new controllers_DbController('error_log');
		$handle->execute('
			INSERT INTO 
				error_log 
				(message, file, line) 
			VALUES 
				("' . $this->_log['message'] . '", "' . $this->_log['file'] . '", "' . $this->_log['line'] . '")
		');
	}
	
	public function returnError(){
		$cfg = @models_Config::getInstance();
		$this->handleError();
		$debug = $cfg->get('debug');
		switch($debug){
			case 'on':
				echo '<pre>';
				echo 'An error occured:' . "\n";
				foreach($this->_log as $key => $value){
					echo "<em><strong>" . $key . ":</strong> " . $value . "</em>\n";
				}
				echo '</pre>';
				echo '<pre>';
				echo 'Stack trace:' . "\n";
				foreach($this->_error->getTrace() as $key => $value){
					echo "<em><strong>" . $key . ":</strong>";
					print_r($value);
					echo "</em>\n";
				}
				echo '</pre>';
			break;
			default:
				echo '<pre>';
				echo 'An error occured, please be patient while we fix the problem.';
				echo '</pre>';
			break;
		}
	}
	
}