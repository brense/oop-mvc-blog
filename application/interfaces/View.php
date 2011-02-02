<?php

interface interfaces_View {
	
	public function setModel(models_Observable $model){}
	public function getModel(){}
	
	public function setController(controllers_AbstractController $controller){}
	public function getController(){}
	
	public function defaultController (models_Observable $model){}
	
}