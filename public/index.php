<?php

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

$router = new Core\Router();
  
$controller = $router->dispatch();


