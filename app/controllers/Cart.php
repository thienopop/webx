<?php
class cart extends Controller {

    // public function __construct() {
    //     parent::__construct();
    //     $this->loadModel('user');
    // }

    public function index($id) {
          $productModel = $this->Model('CartsModel');

        // Lấy dữ liệu

        // Gán các thông tin khác cho view
        $data['title'] = 'Cart Information';
        $data['content'] = 'products/cart';
      
        $data['view_data'] = $productModel->get_carts($id);
      

          $this->view('layouts/client_layout', $data);

    }
}

//     public function profile($id) {
//         $data = $this->user->getUserById($id);
//         if ($data) {
//             $this->view->render('user/profile', ['user' => $data]);
//         } else {
//             $this->view->render('error/404');
//         }
//     }
// }