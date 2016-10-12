<?php

require '../init/init.php' ; // session, config/autoloading

// Testing
// echo '<pre>';
// print_r($_GET) ;
// echo  '</pre>';

error_reporting(E_ALL);

// get  url values
$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

$router = new Core\Router($get);

// $controller = new  home  (index, $urlvalues)	
$controller = $router->createController(); 

if($controller){
	// returns View for the specified controller and method
	$controller->executeAction();
}