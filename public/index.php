<?php
require_once '../config/config.php';

// Autoloader
spl_autoload_register(function($className){
    // Check core
    if(file_exists('../app/core/' . $className . '.php')){
        require_once '../app/core/' . $className . '.php';
    }
    // Check controllers
    else if(file_exists('../app/controllers/' . $className . '.php')){
        require_once '../app/controllers/' . $className . '.php';
    }
    // Check models
    else if(file_exists('../app/models/' . $className . '.php')){
        require_once '../app/models/' . $className . '.php';
    }
});

// Init Core Library
$init = new App();
