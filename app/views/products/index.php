<?php


echo '
<div class="main_sanpham">
    <div class="danh_muc_sanpham"></div>
    <div class="khung_sanpham">
        <div class="display_sanpham">
            <img src="' . $data['img'] . '" alt="thông báo">
            <div class="ten_sanpham">
                <p><b>' . $data['name'] . '</b></p>
            </div>
            <p>Giá: ' . $data['price'] . '</p>
            <input type="button" value="Mua ngay">
        </div>
    </div>
</div>
';
