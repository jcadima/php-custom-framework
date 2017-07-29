<?php

/**
 * Armadillo  - a simple php microframework Version 1.0
 *
 * @package armadillo_mvc_v1
 * @author JC
 * @link http://phpframework.juancadima.com/
 * @link https://github.com/jcadima/php-custom-framework
 * @license http://opensource.org/licenses/MIT MIT License
 */


require '../init/init.php' ; // session, config/autoloading

// get  url values (array)
$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

$router = new Core\Router($get);

$controller = $router->createController(); 

if($controller){
	// returns View for the specified controller and method
	$controller->executeAction();
}