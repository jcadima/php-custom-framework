<?php

class Bootstrap{
	private $controller;
	private $action;
	private $urlvalues;

	// $urlvalues are coming from $_GET,  
	// the .htaccess files is rewriting the $_GET url as:
	// index.php?controller=$1&action=$2&id=$3
	// which can be accessed as: $urlvalues['controller'] , $urlvalues['action'] ... etc
	public function __construct($urlvalues){
		$this->urlvalues = $urlvalues;
		// defaults to 'home' controller if not specified
		if($this->urlvalues['controller'] == ""){
			$this->controller = 'home';
		} 
		else {
			$this->controller = $this->urlvalues['controller'];
		}
		// defaults to 'index' action if not specified
		if($this->urlvalues['action'] == ""){
			$this->action = 'index';
		} 
		else {
			$this->action = $this->urlvalues['action'];
		}
	} // END constructor


/*====================================================
	CREATE CONTROLLER
====================================================*/
	public function createController() {

		if(class_exists(  $this->controller)){
			$parents = class_parents($this->controller);
			// Check if this class extends the Base Controller

			if(in_array("Controller", $parents) ) {
				if(method_exists($this->controller, $this->action)) {			
					// this creates and returns a new controller				
				    return new $this->controller($this->action, $this->urlvalues);

				} 
				else {
					echo '<h1>Method does not exist</h1>';
					return;
				}
			} // END in_array
			else {
				echo '<h1>Base controller not found</h1>';
				return;
			}
		} // END class_exists

		else {
			echo '<h1>Controller class does not exist</h1>';
			return;
		}
	} // END createController
}