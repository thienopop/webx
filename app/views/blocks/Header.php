
  
   
</head>
<body>
    <header>
        <ul class="header1">
            <!-- <li> -->
                 <a href="<?= _WEB_ROOT ?>/home/index"><li>SiuG</li></a>
                <!-- <img src="/web/public/image/header/logo.png" alt="logo"> -->
            <!-- </li> -->
            <li class="top_dow1">
                Giới thiệu 
                                 <!-- <a href="<?= _WEB_ROOT ?>/home/index"><li>SiuX</li></a> -->
                <ul class="top_dow2">
                    <li>
                        danh mục san pham
                    </li>
                    <li>
                        tôm
                    </li>
                    <li>
                        tôm
                    </li>
                </ul>
            </li>
    
            <li class="top_dow3">
                Sản phẩm
                <ul class="top_dow4">
                    <!-- <li > -->
                        <!-- <a href="/product/index">Sản phẩm</a> -->
                        <a href="<?= _WEB_ROOT ?>/product/index"><li>Sản phẩm</li></a>
                    <!-- </li> -->
                    <li>
                        tôm
                    </li>
                    <li><?= $_SESSION['user']['id']?>
                    </li>
                </ul>
            </li>
        </ul>
        <ul class="header2">
            <li>
                <input type="text" placeholder="Tìm kiếm sản phẩm">
            </li>
            <li>
                 <img src="/web/public/image/header/timkiem.jpg" alt="Tìm kiếm sản phẩm">
            </li>
        </ul>
        <ul class="header3">
            <li>
               <img src="/web/public/image/header/thongbao.jpg" alt="thông báo">
            </li>
            <li>
               <img src="/web/public/image/header/giohang.png" alt="Giỏ hàng">
            </li>
            <li class="header3_sup_dropdown3">
               <img src="/web/public/image/header/ttcanha.jpg" alt="Thông tin cá nhân">
               <ul class="header3_sub_dropdown3">
                
                    <a href="<?= _WEB_ROOT ?>/user/index"><li>Thông tin cá nhân</li></a>
              
                    <a href="<?= _WEB_ROOT ?>/user/dangxuat"><li>Đăng xuất</li></a>
              
                    <a href="<?= _WEB_ROOT ?>/user/changePassword"><li>Đổi mật khẩu</li></a>
             
                </ul>
            </li>

        </ul>

    </header>
