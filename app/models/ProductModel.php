<?php
// kế thừa từ class model

 class ProductModel {
  

    // public function getList() {
    //     $sql = "SELECT * FROM products";
    //     $result = $this->conn->query($sql);

    //     $product = [];
    //     while($row = $result->fetch_assoc()) {
    //         $product[] = $row;
    //     }
    //     return $product;
    // }


        public function getList() {
       $product = [
    'img' => '/web/public/image/header/thongbao.jpg',
    'name' => 'Mô tô máy cày',
    'price' => '100$',
    'description' => 'hjdbsjd'
];

        return $product;
    }
}