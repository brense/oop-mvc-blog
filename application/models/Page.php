<?php

class models_Page {
	
	private $_properties = array();
	public $content = array();
	public $sub = array();
	public $trail = array();
	public $vars = array();
	
	public function __construct(){
		
	}
	
	public function getInstance(string $file, string $uri, string $uriparts){
		$cfg=models_Config::getInstance();
		
		if(@$xml = simplexml_load_file($file)); // load page
		else{$xml = simplexml_load_file($cfg->get('docroot') . $cfg->get('pagespath') . '404.xml');} // page not found
		
		// set the page properties
		foreach($xml->setting as $setting){
			$this->set((string)$setting->name, (string)$setting->value);
		}
		$this->set('uri', $uriparts);
		
		// get page content
		$n=0;
		foreach($xml->content as $content){
			$this->content[(string)$n]=(string)$content->value;
			$n++;
		}
		$n=0;
		foreach($xml->sub as $sub){
			$this->sub[(string)$n]=(string)$sub->value;
			$n++;
		}
		
		// set the page trail
		foreach($xml->trail as $trail){
			$this->trail[(string)$trail->link]=(string)$trail->value;
		}
		
		// set the page vars
		$vars=str_replace($uriparts,'',$uri);
		$this->vars=explode('/', $vars);
		
		return $this;
	}
	
	private function set($name,$value){
		$this->_properties[$name]=$value;
	}
	
	public function get($name){
		return $this->_properties[$name];
	}
	
}