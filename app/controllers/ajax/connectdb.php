<?php
class Modeldb {
    public $connect;

    public function __construct() {
        $this->connect = $this->connect();
    }

    private function connect() {
        $host = "localhost";       // máy chủ MySQL
        $username = "thien";        // user MySQL
        $password = "weby";        // mật khẩu
        $database = "webx";        // tên database

        $conn = new mysqli($host, $username, $password, $database); // ✅ Sửa đúng biến

        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        return $conn;
    }
}
