<?php

class blog_models_mappers_PostMapper extends models_mappers_AbstractMapper {
	
	protected $_table = 'blog_posts';
	
	public function __construct(){
		parent::__construct();
	}
	
	public function __destruct(){
		parent::__destruct();
	}
	
	public function get($crits = NULL, $sort = NULL, $limit = NULL){
		$results = $this->_handle->read($crits, $sort, $limit);
		foreach($results as $result){
			$this->_object = new models_blog_Post();
			$this->_object = $this->toObject($result, $this->_object);
			$forums[] = $this->_object;
			unset($this->_object);
		}
		return $forums;
		
	}
	
	public function save(blog_models_Post $object, $action = NULL, $crits = NULL){
		$this->_array = $this->toArray($object);
		parent::save($action, $crits);
	}
	
	public function delete(blog_models_Post $object){
		$this->_array = $this->toArray($object);
		$this->_handle->delete(array('id' => $this->_array['id']));
	}
	
	public function createTable(){
		$query = "CREATE TABLE " . $this->_table . " 
		(
			id int NOT NULL AUTO_INCREMENT, 
			PRIMARY KEY(id),
			title varchar(50),
			description text,
			rules text,
			date int,
			owner int,
			status varchar(50)
		)";
		$this->_handle->execute($query);
	}
	
}