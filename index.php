<?php
// echo "ihu";
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require_once 'conconfig.php';
require_once 'app/configs/config.php';
require_once 'bootstrap.php';
$app=new App();