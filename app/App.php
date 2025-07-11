<?php
class App {
    private $__controller = 'Home';
    private $__action = 'index';
    private $__params = [];

    public function __construct() {
        $this->loadDefaultRoute();
        $this->handleUrl();
    }

    // Lấy giá trị controller/action mặc định từ biến global $routes
    private function loadDefaultRoute() {
        global $routes;
        if (!empty($routes['default'])) {
            $this->__controller = $routes['default']['controller'] ?? 'Home';
            $this->__action = $routes['default']['action'] ?? 'index';
        }
    }

    // Lấy URL người dùng truy cập (VD: /home/show/1)
    private function getUrl() {
        return $_SERVER['PATH_INFO'] ?? '/';
    }

    // Phân tích URL, load controller, action và params
    private function handleUrl() {
        $url = $this->getUrl();
        $urlArr = array_values(array_filter(explode('/', $url)));

        // Xử lý controller
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
            unset($urlArr[0]);
        }

        // Load controller file
        if (!$this->loadController()) return;

        // Xử lý action
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        // Xử lý params
        $this->__params = array_values($urlArr);

        // Gọi action
        $this->callAction();
    }

    // Load file controller và khởi tạo đối tượng
    private function loadController(): bool {
        $controllerFile = 'app/controllers/' . $this->__controller . '.php';

        if (!file_exists($controllerFile)) {
            return $this->loadError("Không tìm thấy file controller: $controllerFile");
        }

        require_once $controllerFile;

        if (!class_exists($this->__controller)) {
            return $this->loadError("Không tìm thấy class controller: {$this->__controller}");
        }

        $this->__controller = new $this->__controller();
        return true;
    }

    // Gọi method (action) trong controller nếu tồn tại
    private function callAction() {
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->loadError("Không tìm thấy action: {$this->__action}");
        }
    }

    // Load trang lỗi
    private function loadError($message = "Lỗi hệ thống"): bool {
        echo "<h2 style='color: red;'>$message</h2>";

        $errorPage = 'app/errors/404.php';
        if (file_exists($errorPage)) {
            require_once $errorPage;
        } else {
            echo "<p style='color: gray;'>Không tìm thấy file lỗi: 404.php</p>";
        }

        return false;
    }
}
