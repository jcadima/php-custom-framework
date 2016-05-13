<?php

class View {


	protected $viewFile;
	protected $controllername;
	protected $actionname;

/*====================================================
	CONSTRUCTOR - set controller and action
====================================================*/
    public function __construct($controllerClass, $action) {

    	$this->controllername = $controllerClass;
    	$this->actionname = $action;
    }

/*====================================================
	OUTPUT VIEW FILE
====================================================*/
	public  function output($viewData, $fullview) {
		// $viewmodel contains the data fetched from the models
		$view = 'views/'. $this->controllername . '/' . $this->actionname . '.php';
		if($fullview) {
			require('views/main.php');
		} 
		else {
			require($view);
		}
	}
}


