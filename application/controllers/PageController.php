<?php

class controllers_PageController {
	
	private $_page;
	private $_pages;
	private $_model;
	
	public function __construct(){
		$this->_model=new models_Page();
	}
	
	public function getPage($uri){
		if(substr($uri,-1,1)=='/'){$uri = substr($uri,0,-1);}
		$cfg=models_Config::getInstance();
		$uriparts=explode('/', $uri);
		$count=count($uriparts);
		for($n=0; $n<$count; $n++){
			if(!isset($pageuri)){
				unset($uriparts[$count-$n]);
				if(file_exists($cfg->get('docroot') . $cfg->get('pagespath') . implode('/', $uriparts) . '.xml')){
					$pageuri=$cfg->get('docroot') . $cfg->get('pagespath') . implode('/', $uriparts) . '.xml';
				}
			}
		}
		if(!$pageuri){$pageuri = $cfg->get('docroot') . $cfg->get('pagespath') . 'home.xml';}
		
		$this->_page = $this->_model->getInstance(new String($pageuri), new String($uri), new String(implode('/',$uriparts)));
		return $this->_page;
	}
	
	public function getPages(){
		
	}
	
}