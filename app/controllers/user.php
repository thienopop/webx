<?php
class user extends Controller {

    // public function __construct() {
    //     parent::__construct();
    //     $this->loadModel('user');
    // }

    public function index() {
          $productModel = $this->Model('UsersModel');

        // Lấy dữ liệu

        // Gán các thông tin khác cho view
        $data['title'] = 'User Information';
        $data['content'] = 'users/index';
      
        $data['view_data'] = $productModel->getInfo(1);
      

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