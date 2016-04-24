<?php
require 'core/init.php' ;

// see the url values
echo '<pre>';
print_r($_GET) ;
echo  '</pre>';

$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);

$bootstrap = new Bootstrap($get);


$controller = $bootstrap->createController(); 


if($controller){

	$controller->executeAction();
}