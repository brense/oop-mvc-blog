<?php

class models_Config {
	
	private $_properties = array();
	private static $_instance;
	
	private function __construct(){}
	
	public function getInstance(){
		if(empty(self::$_instance)){
			self::$_instance=new models_Config();
		}
		return self::$_instance;
	}
	
	public function load(string $file){
		$xml=simplexml_load_file($file);
		foreach($xml->entry as $entry){
			$this->set((string)$entry->name, (string)$entry->value);
		}
	}
	
	public function set($name, $value){
		$this->_properties[$name]=$value;
	}
	
	public function get($name){
		return $this->_properties[$name];
	}
	
}