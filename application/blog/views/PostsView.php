<?php

class blog_views_PostsView extends views_AbstractView {
	
	public function __construct(models_Observable $model, controllers_Controller $controller = NULL){
		parent::__construct($model, $controller);
	}
	
	public function render($options = array()){
		foreach($options as $option => $value){
			switch($option){
				case '':
				
				break;
			}
		}
		$posts = $this->_controller->getPosts($crits, $sort, $limit);
	}
	
}