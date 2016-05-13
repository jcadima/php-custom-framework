<?php

abstract class Controller{
	protected $urlvalues;
	protected $action;
	protected $view;

	public function __construct($action, $urlvalues){
		$this->action = $action;  // index
		$this->urlvalues = $urlvalues;

		//establish the view object
		$this->view = new View(get_class($this), $action);
	}

/*====================================================
	EXECUTE ACTION
====================================================*/
	public function executeAction() {
		// returns index() for Home 
		return $this->{$this->action}();
	}
 
}

