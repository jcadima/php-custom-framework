<?php

abstract class Controller{
	protected $urlvalues;
	protected $action;

	public function __construct($action, $urlvalues){
		$this->action = $action;  // index
		$this->urlvalues = $urlvalues;
	}

/*====================================================
	EXECUTE ACTION
====================================================*/
	public function executeAction() {
		// returns index() for Home 
		return $this->{$this->action}();
	}
 

/*====================================================
	RETURN VIEW
====================================================*/
	protected function returnView($viewmodel, $fullview) {
	
		$view = 'views/'. get_class($this). '/' . $this->action. '.php';
		if($fullview) {
			require('views/main.php');
		} 
		else {
			require($view);
		}
	}
}

