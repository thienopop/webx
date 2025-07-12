<?php
class Controller
{
    public function model($modelName)
    {

        $path ='app/models/'.$modelName.'.php';
        if (file_exists($path)) {
         require_once $path;
         $model = new $modelName();
         return $model;
        } else {
           return false;
}
    }
    public function view($viewName, $data = [])
    {
       
$path = 'app/views/' . $viewName . '.php';
    if (file_exists($path)) {
        extract($data); // giải nén mảng $data thành biến
        require_once $path;
    } else {
        die("View does not exist: " . $viewName);
    }
    }

}

