<?php

class autoload_AutoLoader {
	public static $instance;
	private $_src=array('application/', 'library/', 'library/datatypes/');
	private $_ext=array('.php', '.class.php', '.lib.php');
	
	/* initialize the autoloader class */
	public static function init($src=NULL,$ext=NULL){
		if(self::$instance==NULL){
			self::$instance=new self($src,$ext);
		}
		return self::$instance;
	}
	
	/* put the custom functions in the autoload register when the class is initialized */
	private function __construct($src=NULL,$ext=NULL){
		if(is_array($src)){$this->_src=$src;}
		if(is_array($ext)){$this->_ext=$ext;}
		spl_autoload_register(array($this, 'clean'));
		spl_autoload_register(array($this, 'dirty'));
	}
	
	/* the clean method to autoload the class without any includes, works in most cases */
	private function clean($class){
		global $docroot;
		$class=str_replace('_', '/', $class);
		spl_autoload_extensions(implode(',', $this->_ext));
		$success = false;
		foreach($this->_src as $resource){
			foreach($this->_ext as $ext){
				if(file_exists($docroot . $resource . $class . $ext)){
					$success = true;
				}
			}
			set_include_path($docroot . $resource);
			spl_autoload($class);

		}
		if(!$success){
			throw new Exception('class ' . $class . ' not found');
		}
	}
	
	/* the dirty method to autoload the class after including the php file containing the class */
	private function dirty($class){
		global $docroot;
		$class=str_replace('_', '/', $class);
		$success = false;
		foreach($this->_src as $resource){
			foreach($this->_ext as $ext){
				if(file_exists($docroot . $resource . $class . $ext)){
					$success = true;
				}
				@include($docroot . $resource . $class . $ext);
			}
		}
		spl_autoload($class);
		if(!$success){
			throw new Exception('class ' . $class . ' not found');
		}
	}

}