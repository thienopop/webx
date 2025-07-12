<?php
class Product extends Controller {

    public function index() {
        // Gọi model
        $productModel = $this->Model('ProductModel');

        // Lấy dữ liệu

        // Gán các thông tin khác cho view
        $data['title'] = 'Product';
        $data['content'] = 'products/index';
      
        $data['view_data'] = $productModel->getList();
      

          $this->view('layouts/client_layout', $data);
    }

    public function detail($id = null) {
        // Gọi model
        $productModel = $this->Model('ProductModel');

        // Lấy dữ liệu

        // Gán các thông tin khác cho view
        $data['title'] = 'Product Detail';
        $data['content'] = 'products/detail';
        if ($id === null) {
            $this->loadError("ID sản phẩm không được để trống.");
            return;
        }
        $data['view_data'] = $productModel->getDetail($id);

          $this->view('layouts/client_layout', $data);
    }



}

