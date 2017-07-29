<?php
// Start Session
session_start();

// include configuration
require_once '../config/config.php' ;

function multiple_directory_autoload($class) {
    $root = dirname(__DIR__);   // get the parent directory

    $file = $root . '/' . str_replace('\\', '/', ucfirst($class ) ) . '.php';
 
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', ucfirst( $class) ) . '.php';
    }
}

spl_autoload_register('multiple_directory_autoload');
