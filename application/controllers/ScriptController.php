<?php

class controllers_ScriptController {
	
	private $_scriptpath;
	private $_scripts;
	
	public function __construct($path){
		$this->_scriptpath=$path;
	}
	
	public function load(){
		if($handle=opendir($this->_scriptpath)){
   			while(false!==($file=readdir($handle))){
        		if($file!="." && $file!=".." && substr($file,-3,3)=='.js'){
            		$this->_scripts[]=new models_Script($file);
        		}
    		}
    		closedir($handle);
		}
		return $this->_scripts;
	}
	
}