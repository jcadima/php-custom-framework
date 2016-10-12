<?php
namespace Core;


abstract class Controller{
	protected $urlvalues;
	protected $action;
	protected $view;

	public function __construct($action, $urlvalues){
		$this->action = $action;  // index
		$this->urlvalues = $urlvalues;
	}

/*====================================================
	EXECUTE ACTION
====================================================*/
	public function executeAction() {
		// returns index() for Home 
		/* this will call the method and will load a template
			- All other controllers like home, posts extend this controller
			- since this method is extended it is available for the other controllers that extend this one
			- In the case of Home controller, since executeAction is declared here,
			  there is no need to redeclare it in the Home Controller, index.php creates the following:
				  // $controller = new  home  (index, $urlvalues)	
				  $controller = $router->createController(); 
			  so we now have a home object and can call:
			  	  $controller->executeAction();
			  	  
			- This allows us to make the following call:  $this->{$this->action}();
			  which calls the Home action method, but this is set in this Base Controller Constructor: $this->action = $action
			  which will make $this->{$this->action}(); ->   $this->index() , or $this->view(), and this calls the Home controller
			  index() or view() methods depending on what was passed to,  this Base Controller Constructor
			- executeAction() is shared by all Controllers, otherwise we would have a executeAction() in every Controller
			- This is returned to the index.php file
		*/
		// this returns: View::renderTemplate($data, "views/home/index.php", true) ; in the Home Controller,
		// remember the Home Controller calls itself , thats why we have $this->{$this->action}() 
		return $this->{$this->action}();
	}

}

