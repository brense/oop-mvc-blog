<?php

class blog_controllers_PostController extends controllers_AbstractController {
	
	private $_posts = array();
	private $_post;
	
	public function __construct(models_Observable $model){
		parent::__construct($model);
	}
	
	public function getPosts($crits = NULL, $sort = NULL, $limit = NULL){
		$postMapper = new blog_models_mappers_PostMapper();
		$this->_posts = $postMapper->getPosts($crits, $sort, $limit);
		return $this->_posts;
	}
	
	public function addAction(){
		
	}
	
	public function editAction(){
		
	}
	
	public function deleteAction(){
		
	}
		
	public function postMapperOpperations($opperation){
		$postMapper = new blog_models_mappers_PostMapper();
		switch($opperation){
			case 'create':
				$postMapper->createTable();
			break;
			case 'drop':
				$postMapper->dropTable();
			break;
			case 'empty':
				$postMapper->emptyTable();
			break;
		}
	}
	
}