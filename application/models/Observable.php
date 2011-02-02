<?php

abstract class models_Observable {
	
	private $_observers = array();
	
	public function addObserver(views_AbstractView $view){
		$this->_observers[] = $view;
	}
	
	public function removeObserver(views_AbstractView $view){
		foreach($this->_observers as &$observer){
			if($observer === $view){
				unset($observer);
			}
		}
	}
	
	public function notifyObservers($changes){
		foreach($this->_observers as $observer){
			$observer->update($this, $changes);
		}
	}
	
	public function __set($name, $value){
		$changes = array(
			'function'	=> 'set',
			'params'	=> $name,
			'values'	=> $value,
			'timestamp'	=> date('U')
		);
		$this->notifyObservers($changes);
		$this->_history[] = $changes
		$this->set($name, $value);
	}
	
	public function __get($name){
		$changes = array(
			'function'	=> 'get',
			'params'	=> $name,
			'values'	=> $this->get($name),
			'timestamp'	=> date('U')
		);
		$this->notifyObservers($changes);
		$this->_history[] = $changes
		return $this->get($name);
	}
	
	public function getHistory(){
		return $this->_history;
	}
	
}