<?php
// This file is used to bootstrap the application
// It initializes the session and includes necessary configuration files
// It is included at the beginning of the index.php file
// to set up the application environment
// Do not modify this file unless you know what you are doing
// This file should be included before any other files in the application
// It is recommended to keep this file at the root of the application directory
// so that it can be easily included in the index.php file
// This file is essential for the application to run properly

// define('_DIR_ROOT', __DIR__); // Define the application path
// echo "Application path: " . _DIR_ROOT . "\n"; // Output the application path
require_once 'app/configs/app.php';
require_once 'app/App.php';
require_once 'core/Controller.php';