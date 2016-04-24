<?php
// Start Session
session_start();

// include configuration
require_once 'config/config.php' ;


function multiple_directory_autoload($class) {
    # List all the class directories in the array.
    $array_paths = array(
        'classes/', 
        'controllers/',
        'models/'
    );

    foreach($array_paths as $path) {
        $file =    $path . $class   . '.php' ;
        if(is_file($file)) 
        {
            require $file;
        } 

    }
}

spl_autoload_register('multiple_directory_autoload');
