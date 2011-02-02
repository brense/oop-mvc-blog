<?php

interface interfaces_Controller {
	
	public function setModel(models_Observable $model){}
	public function getModel(){}
	
	public function setView(views_AbstractView $view){}
	public function getView(){}
	
}