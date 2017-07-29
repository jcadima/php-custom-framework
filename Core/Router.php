<?php
namespace Core;
class Router{
	private $url_controller ;
	private $url_action = null;
	private $namespace;
<<<<<<< HEAD

	protected $params = [];

/*====================================================
	CONSTRUCTOR - initialize  controller, action 
====================================================*/
	public function __construct(){

	 	if (isset($_GET['qs'])) {
			$url = filter_var( $_GET['qs'], FILTER_SANITIZE_URL);

			$url = explode('/', $url);

			$this->url_controller =  isset($url[0]) ? $url[0] : null;	
			$this->url_action     =  isset($url[1]) ? $url[1] : 'index';
			$this->params        = array_slice($url,2)  ;
		}
=======
/*====================================================
	CONSTRUCTOR - initialize  controller, action 
====================================================*/
	public function __construct($urlvalues){
		$this->urlvalues = $urlvalues;
		$this->controller = $this->urlvalues['controller'] ;
		switch ($this->controller) {
			// ADMIN
			case "dashboard" :
			case "authenticate":
			case "users":
			case "posts":
					$this->namespace = 'App\Controllers\Admin\\';
					$this->controller = $this->urlvalues['controller'];
				break;

			default:
					$this->namespace = 'App\Controllers\\';
					$this->controller = ( $this->urlvalues['controller'] == ""  )  ?  'home' : $this->urlvalues['controller']  ;
				break;
		}
		// defaults to 'index' action if not specified
		$this->action = ( $this->urlvalues['action'] == ""  )  ?  'index' : $this->urlvalues['action']  ;
>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f

	} // END constructor


	protected function getNamespace()  {

		$adminNS = array('Dashboard','Authenticate','Users','Posts');
		$namespace = (in_array( ucfirst($this->url_controller) , $adminNS ) )  ? 'App\Controllers\\Admin\\' : 'App\Controllers\\'  ;
		return $namespace;
	}

/*====================================================
	CREATE CONTROLLER
====================================================*/
<<<<<<< HEAD
	public function dispatch() {

		if ( !$this->url_controller  )  {
			$home = new \App\Controllers\Home() ;
			$home->index() ;
		}

		elseif( class_exists( $this->getNamespace() . ucfirst( $this->url_controller) )  ) {
			$this->url_controller = $this->getNamespace() . ucfirst( $this->url_controller) ;
			$objcontroller = new $this->url_controller();  // NEW CONTROLLER

				if(method_exists( $this->url_controller , $this->url_action)) {

					if ( !empty($this->params && $this->params != "") ) {
			 			call_user_func_array( array( $objcontroller, $this->url_action),$this->params ) ;
					}

					else {
						$objcontroller->{$this->url_action }() ;
					}
=======
	public function createController() {
		$controller = $this->namespace . $this->controller;
			// echo "NAMESPACE: $this->namespace<br>";
			// echo "CONTROLLER: $this->controller<br>" ;
		if(class_exists( $controller  )  ){
			// return the parent classes of the controller
			$parents = class_parents($controller);
			// Check if this class extends the Base Controller
			if(in_array("Core\Controller", $parents) ) {
				if(method_exists($controller, $this->action)) {			
					// this creates and returns a new controller	
					// ex: new            home  (index, $urlvalues)		
				    return new $controller($this->action, $this->urlvalues);
>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f
				} 
				else {
					echo "<h1>Method $this->url_action does not exist</h1>";
					return;
				}
<<<<<<< HEAD
		} 

=======
			} // END in_array
			else {
				echo '<h1>Router controller not found</h1>';
				return;
			}
		} // END class_exists
>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f
		else {
			echo "<h1>Controller $this->url_controller does not exist</h1>";
			return;
		}
	} // END createController
} // END CLASS