

<?php
class Home extends Controller{
    public function index()
{
        // // Hiển thị trang chủ
        $data['title']='Trang chủ';
        $data['content'] = 'Home/index';
        $this->view('layouts/client_layout', $data);
    }


}

