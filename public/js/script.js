/* <1sản phẩm> */
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.main_sanphamMua');
    buttons.forEach(button => {
        button.addEventListener('click', function () {
            const productId = this.getAttribute('data-id');
            // Chuyển hướng đến trang chi tiết
            window.location.href = '<?= _WEB_ROOT ?>/product/detail/' + productId;
        });
    });
});




// </ 1  sản phẩm>

/* <3 chi tiết sản phảm> */

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
    
  /* </3 chi tiết sản phảm> */