<?php
class Product extends Controller {

    public function index() {
        // Gọi model
        $productModel = $this->Model('ProductModel');

        // Lấy dữ liệu

        // Gán các thông tin khác cho view
        $data['title'] = 'Product';
        $data['content'] = 'products/index';
        $data['list'] = $productModel->getList();
      
//         $data=[
//     'title' => 'Product',
//     'content' => 'products/index',
//     'list' => [
//         'img' => 'public/image/header/thongbao.jpg',
//         'name' => 'Mô tô máy cày',
//         'price' => '100$',
//         'description' => 'hjdbsjd'
//     ]
// ];
   
          $this->view('layouts/client_layout', $data);
    }
}

