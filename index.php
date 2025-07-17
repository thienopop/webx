<?php
// echo "ihu";
session_start();

$_SESSION['user'] = [
    'id' => 3,
    'name' => 'Nguyễn Văn A',
    'email' => 'a@gmail.com'
];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require_once 'conconfig.php';
require_once 'app/configs/config.php';
require_once 'bootstrap.php';
$app=new App();