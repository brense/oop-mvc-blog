<?php

class models_Script {
	
	private $_name;
	private $_type;
	private $_location;
	private $_content;
	
	public function __construct($script){
		$this->_name=$script;
		$cfg=models_Config::getInstance();
		$this->_type=mimetypes_MimeTypes::get($cfg->get('docroot') . $cfg->get('sitename') . '/' . $cfg->get('scriptpath') . $this->_name);
		$this->_location=$cfg->get('siteroot') . $cfg->get('scriptpath');
		$this->_content=$this->contentHash($cfg->get('docroot') . $cfg->get('sitename') . '/' . $cfg->get('scriptpath') . $this->_name);
	}
	
	private function contentHash($file){
		return md5(@file_get_contents($file));
	}
	
	public function get(){
		return $this->_location . $this->_name;
	}
	
}