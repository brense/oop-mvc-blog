<?php

class models_Browser {
	
	private $_properties = array();
	private static $_instance;
	
	private function __construct(){}
	
	public function getInstance(){
		if(empty(self::$_instance)){
			self::$_instance=new models_Browser();
		}
		return self::$_instance;
	}
	
	public function load(){
		$client =& new sniffer_phpsniff();
		foreach($client->_browser_info as $key=>$value){
			$this->set((string)$key, (string)$value);
		}
	}
	
	public function set($name,$value){
		$this->_properties[$name]=$value;
	}
	
	public function get($name){
		return $this->_properties[$name];
	}
	
}