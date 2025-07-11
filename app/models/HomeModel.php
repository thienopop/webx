<?php
// kế thừa từ class model

 class HomeModel {
    protected $_table = 'home'; // Tên bảng trong cơ sở dữ liệu 
    protected $_primaryKey = 'id'; //
    // Khởi tạo kết nối cơ sở dữ liệu
    public function getList() {
        
        $data=['1','2','3'];
        return $data;
    }
    
}