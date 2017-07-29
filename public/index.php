<?php

<<<<<<< HEAD
/**
 * Armadillo  - a simple php microframework
 *
 * @package armadillo_mvc
 * @author JC
 * @link http://phpframework.juancadima.com/
 * @link https://github.com/jcadima/php-custom-framework-v2
 * @license http://opensource.org/licenses/MIT MIT License
 */

require '../init/init.php' ; // session, config/autoloading
=======
require '../init/init.php' ; // session, config/autoloading

// get  url values (array)
$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f

$router = new Core\Router();
  
$controller = $router->dispatch();

<<<<<<< HEAD
=======
$controller = $router->createController(); 
>>>>>>> 4b36f592e880f1e61cd21d360a6dbac592be844f

