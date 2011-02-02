<?php

abstract class views_AbstractView implements interfaces_Observer, interfaces_View {
	
	protected $_model;
	protected $_controller;
	
	public function __construct(models_Observable $model, controllers_Controller $controller = NULL){
		$this->_setModel($model);
		if(isset($controller)){
			$this->_setController($controller);
		}
	}
	
	public function defaultController(models_Observable $model){
		return NULL;
	}
	
	public function setModel(models_Observable $model){
		$this->_model = $model;
	}
	
	public function getModel(){
		return $this->_model;
	}
	
	public function setController(controllers_Controller $controller){
		$this->_controller = $controller;
		$this->getController()->setView($this);
	}
	
	public function getController(){
		if(!isset($this->_controller)){
			$this->setController($this->defaultController($this->getModel()));
		}
		return $this->_controller;
	}
	
	public function update(models_Observable $observable, $changes){
		foreach($changes as $key => $value){
			$observable->{$key} = $value;
		}
	}
}