<?php

abstract class controllers_AbstractController implements interfaces_Controller {
	
	protected var $_model;
	protected var $_view;
	
	public function __construct(models_Observable $model){
		$this->setModel($model);
	}
	
	public function setModel(models_Observable $model){
		$this->_model = $model;
	}
	
	public function getModel(){
		return $this->_model;
	}
	
	public function setView(views_AbstractView $view){
		$this->_view = $view;
	}
	
	public function getView(){
		return $this->_view;
	}
	
}