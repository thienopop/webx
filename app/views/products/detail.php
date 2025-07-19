
    <div class="main_chitiet">
        <div class="main_chitiet_img_chitiet">
             <img src="<?= htmlspecialchars($data['image_url']) ?>" alt="thông báo">
        </div>
        <div class="main_chitiet_thongtin_chitiet">
            <form>
            <p><b>Tên sản phẩm: </b><?= htmlspecialchars($data['name']) ?></p>
             <p><b>Mô tả sản phầm: </b> <?= htmlspecialchars($data['description']) ?></p>
            <p><b>Giá: </b>  <?= number_format($data['price'], 0, ',', '.') ?>₫</p>
            <!-- <p><b>Số lượng:</b> <?= $data['stock'] ?></p> -->
            <input  style="width:40px" id="main_chitiet_giam_soluong_ctsp" type="button" value="-">
            <input style="width:80px" type="number" readonly id="main_chitiet_soluong_sanpham_ctsp"  value="1" min="1">
            <input style="width:40px" id="main_chitiet_tang_soluong_ctsp" type="button" value="+">
           <br>
           <i class="main_chitiet_note" style="font-size: 20px; "></i>
           <br>
           <input type="button" id="main_chitiet_id_sanpham" data-id="<?= $data['id'] ?>" value="Thêm vào giỏ hàng">
           <input  style="background-color: rgb(254, 51, 51); " data-id="<?= $data['id'] ?>"type="button" value="Mua">


           </form>
        </div>
    </div>
<!-- <script src="?= _WEB_ROOT ?>/public/js/script.js"></script> -->

    <script>

const tang_soluong=document.querySelector("#main_chitiet_tang_soluong_ctsp"); //button xoá sản phẩm ra khỏi chi tiết
            const giam_soluong=document.querySelector("#main_chitiet_giam_soluong_ctsp"); //button xoá sản phẩm ra khỏi chi tiết

// tăng sản phầm
tang_soluong.addEventListener("click", function() {

    const sl_hienthi = document.querySelector("#main_chitiet_soluong_sanpham_ctsp");

    // Tăng giá trị hiện tại lên 1
    sl_hienthi.value = parseInt(sl_hienthi.value) + 1;
    capnhatthanhtien()
  });
// xoá sản phâm khỏi chi tiết
giam_soluong.addEventListener("click", function() {
    const sl_hienthi = document.querySelector("#main_chitiet_soluong_sanpham_ctsp");
    if(sl_hienthi.value<=1)
  {
    return;
  }
    // giam giá trị hiện tại
    sl_hienthi.value = parseInt(sl_hienthi.value) -1;
    capnhatthanhtien();
  });


function themvao_giohang() {
    let num = document.getElementById('main_chitiet_soluong_sanpham_ctsp').value;
    
    // Sửa chỗ này
    let id = document.getElementById('main_chitiet_id_sanpham').getAttribute('data-id');

    fetch('<?= _WEB_ROOT ?>/app/controllers/ajax/add_cart.php?product_id=' + id + '&sl=' + num)
        .then(response => response.text())
        .then(data => {
           
            document.querySelector('.main_chitiet_note').textContent = data;

        });
}
document.getElementById('main_chitiet_id_sanpham').addEventListener('click', themvao_giohang);


     </script>