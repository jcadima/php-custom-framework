<?php
namespace Core;

class Router{
	private $controller;
	private $action;
	private $urlvalues;
	private $namespace;

/*====================================================
	CONSTRUCTOR - initialize  controller, action 
====================================================*/
	public function __construct($urlvalues){
		$this->urlvalues = $urlvalues;
		$this->controller = $this->urlvalues['controller'] ;

		switch ($this->controller) {
			case "" :  
					$this->namespace = 'App\Controllers\\';
					$this->controller = 'home';
				break;

			case "dashboard" :
			case "authenticate":
			case "users":
			case "posts":
					$this->namespace = 'App\Controllers\Admin\\';
					$this->controller = $this->urlvalues['controller'];
				break;

			default:
					$this->namespace = 'App\Controllers\\';
					$this->controller = $this->urlvalues['controller'];
				break;

		}
		// defaults to 'index' action if not specified
		if($this->urlvalues['action'] == "") {
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
            $controller = $this->controller;
			$controller = $this->namespace . $this->controller;

			// echo "NAMESPACE: $this->namespace<br>";
			// echo "CONTROLLER: $this->controller<br>" ;
   			// echo "PATH: " . $controller . "<br>";
		if(class_exists( $controller  )  ){
			// return the parent classes of the controller
			$parents = class_parents($controller);

			// Check if this class extends the Base Controller
			if(in_array("Core\Controller", $parents) ) {
				if(method_exists($controller, $this->action)) {			
					// this creates and returns a new controller	
					//     new            home  (index, $urlvalues)		
				    return new $controller($this->action, $this->urlvalues);

				} 
				else {
					echo "<h1>Method $this->action does not exist</h1>";
					return;
				}
			} // END in_array
			else {
				echo '<h1>Router controller not found</h1>';
				return;
			}
		} // END class_exists

		else {
			echo "<h1>Controller $controller does not exist</h1>";
			return;
		}
	} // END createController




} // END CLASS
