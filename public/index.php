<?php

require '../init/init.php' ; // session, config/autoloading

// get  url values (array)
$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

$router = new Core\Router($get);

$controller = $router->createController(); 

if($controller){
	// returns View for the specified controller and method
	$controller->executeAction();
}