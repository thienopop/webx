<?php
  function connect() {
    $host = "localhost";
    $username = "thien";
    $password = "weby";
    $database = "webx";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    return $conn;
}