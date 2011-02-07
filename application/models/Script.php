<?php

class models_Script {
	
	private $_name;
	private $_type;
	private $_location;
	private $_content;
	
	public function __construct($script){
		$this->_name=$script;
		$cfg=models_Config::getInstance();
		$file = $cfg->get('docroot') . $cfg->get('scriptpath') . $this->_name;
		if(!file_exists($file)){
			throw new Exception('script "' . $file . '" not found');
		}
		$this->_type=mimetypes_MimeTypes::get($file);
		$this->_location=$cfg->get('siteroot') . $cfg->get('scriptpath');
		$this->_content=$this->contentHash($file);
	}
	
	private function contentHash($file){
		return md5(@file_get_contents($file));
	}
	
	public function get(){
		return $this->_location . $this->_name;
	}
	
}