<?php

class controllers_blog_PostController extends controllers_AbstractController {
	
	private $_posts = array();
	private $_post;
	
	public function __construct(models_Observable $model){
		parent::__construct($model);
	}
	
	public function indexAction(){
		$postMapper = new models_blog_mappers_PostMapper();
		$this->_posts = $postMapper->getPosts($crits, $sort, $limit);
		return $this->_forums;
	}
	
	public function addAction(){
		
	}
	
	public function editAction(){
		
	}
	
	public function deleteAction(){
		
	}
		
	public function postMapperOpperations($opperation){
		$postMapper = new models_blog_mappers_PostMapper();
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