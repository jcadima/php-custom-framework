<?php
namespace Core;

class Router{
	private $url_controller ;
	private $url_action = null;
	private $namespace;

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

	} // END constructor


	protected function getNamespace()  {

		$adminNS = array('Dashboard','Authenticate','Users','Posts');
		$namespace = (in_array( ucfirst($this->url_controller) , $adminNS ) )  ? 'App\Controllers\\Admin\\' : 'App\Controllers\\'  ;
		return $namespace;
	}

/*====================================================
	CREATE CONTROLLER
====================================================*/
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
				} 
				else {
					echo "<h1>Method $this->url_action does not exist</h1>";
					return;
				}
		} 

		else {
			echo "<h1>Controller $this->url_controller does not exist</h1>";
			return;
		}
	} // END createController




} // END CLASS
