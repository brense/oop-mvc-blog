<?php

interface interfaces_Observer {
	
	public function update(models_Observable $observable, $changes){}
	
}