<?php
class App {
    private $__controller;
    private $__action;
    private $__params;

    public function __construct() {
        global $routes;
                if(!empty($routes['default'])) {
            $this->__controller = $routes['default']['controller'] ?? 'Home';
            $this->__action = $routes['default']['action'] ?? 'index';
        } else {
            $this->__controller = 'Home';
            $this->__action = 'index';
        }
        $this->handleUrl();

    }

    private function getUrl() {
        return isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '/';
    }

    private function handleUrl() {
        $url = $this->getUrl();
        $urlArr = array_filter(explode('/', $url));
        $urlArr = array_values($urlArr); // reset key về 0,1,2,...
        // Xử lý controller
        if (!empty($urlArr[0])) {
            $this->__controller = ucfirst($urlArr[0]);
            unset($urlArr[0]);
        }

        $controllerPath = 'app/controllers/' . $this->__controller . '.php';
        if (file_exists($controllerPath)) {
            require_once $controllerPath;
            if (class_exists($this->__controller)) {
                $this->__controller = new $this->__controller();
            } else {
                $this->loadError("Không tìm thấy class controller.");
                return;
            }
        } else {
            $this->loadError("Không tìm thấy file controller.");
            return;
        }

        // Xử lý action (method)
        if (!empty($urlArr[1])) {
            $this->__action = $urlArr[1];
            unset($urlArr[1]);
        }

        // Xử lý params
        $this->__params = array_values($urlArr);

        // Gọi method (action)
        if (method_exists($this->__controller, $this->__action)) {
            call_user_func_array([$this->__controller, $this->__action], $this->__params);
        } else {
            $this->loadError("Không tìm thấy method/action.");
        }
    }

    private function loadError($message = "Lỗi hệ thống") {
        echo "<h2 style='color: red;'>$message</h2>";
        if (file_exists('app/errors/404.php')) {
            require_once 'app/errors/404.php';
        } else {
            echo "<p>Không tìm thấy trang lỗi (404.php).</p>";
        }
    }
}
