
 



  <div class="main_giohang">
    
      <table>
        <tr>
          <th>Hình ảnh</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Giá</th>
          <th>Xoá</th>
        </tr>
<!-- 
    SELECT cart_items.id, cart_items.quantity, products.name, products.price, products.image_url, products.stock 
FROM cart_items  -->

       <?php foreach ($data as $sp): ?>
<tr data-cartid="<?= $sp['id'] ?>">
    <!-- <td><input class="main_giohang_chon_sanpham" type="checkbox" style="width: 20px; height: 20px;"></td> -->
    <td><img class="main_giohang_anh_mota" src="<?= $sp['image_url'] ?>" alt="hình"></td>
    <td><?= htmlspecialchars($sp['name']) ?></td>
    <td>
        <input type="button" class="main_giohang_giam_soluong" value="-">
        <input style="width: 70px;" readonly class="main_giohang_soluong_sanpham" type="number" value="<?= $sp['quantity'] ?>">
        <input type="button" class="main_giohang_tang_soluong" value="+">
    </td>
    <td class="main_giohang_gia" data-gia="<?= $sp['price'] ?>"><?= number_format($sp['price']) ?>đ</td>
    <td><input type="button" class="main_giohang_xoa_khoigiohang" value="Xoá"></td>
</tr>
<?php endforeach; ?>


       </table>




    <div class="main_giohang_div_thanhtoan">
      <p style="font-size: 30px;">Thành tiền: <span class="main_giohang_thanh_tien">0 VND</span></p>
      <input id="main_giohang_thanhtoan" type="button" value="Thanh toán" disabled />
    </div>
  </div>
  

<script>
document.addEventListener("DOMContentLoaded", function () {
  const nutXoa = document.querySelectorAll(".main_giohang_xoa_khoigiohang");
  const nutTang = document.querySelectorAll(".main_giohang_tang_soluong");
  const nutGiam = document.querySelectorAll(".main_giohang_giam_soluong");

  nutTang.forEach(function (btn) {
    btn.addEventListener("click", function () {
      const td = btn.closest("td");
      const sl = td.querySelector(".main_giohang_soluong_sanpham");
      sl.value = parseInt(sl.value) + 1;
      update_sl_cart(btn.closest("tr").getAttribute("data-cartid"), sl.value);
      capnhatThanhTien();
    });
  });

  nutGiam.forEach(function (btn) {
    btn.addEventListener("click", function () {
      const td = btn.closest("td");
      const sl = td.querySelector(".main_giohang_soluong_sanpham");
      if (parseInt(sl.value) > 1) {
        sl.value = parseInt(sl.value) - 1;
        update_sl_cart(btn.closest("tr").getAttribute("data-cartid"), sl.value);
        capnhatThanhTien();
      }
    });
  });

  nutXoa.forEach(function (btn) {
    btn.addEventListener("click", function () {
      const cartId_item = btn.closest("tr").getAttribute("data-cartid");
      if (cartId_item) delete_cart(cartId_item);
      btn.closest("tr").remove();
      capnhatThanhTien();
    });
  });

  function capnhatThanhTien() {
    let tong = 0;
    document.querySelectorAll(".main_giohang_gia").forEach(function (chon) {
      const tr = chon.closest("tr");
      const soLuong = parseInt(tr.querySelector(".main_giohang_soluong_sanpham").value);
      const gia = parseFloat(chon.dataset.gia);
      tong += soLuong * gia;
    });

    document.querySelector(".main_giohang_thanh_tien").textContent = tong.toLocaleString() + " đ";

    const nutThanhToan = document.getElementById("main_giohang_thanhtoan");
    nutThanhToan.disabled = tong <= 0;
    nutThanhToan.style.backgroundColor = tong > 0 ? "red" : "white";
  }

  function update_sl_cart(id_cart_item, sl) {
    if (!id_cart_item || !sl) return;
    const url = "<?= _WEB_ROOT ?>/app/controllers/ajax/update_sl_cart_item.php?id=" + encodeURIComponent(id_cart_item) + "&sl=" + encodeURIComponent(sl);
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      console.log("Phản hồi từ server:", this.responseText);
    };
    xhttp.open("GET", url, true);
    xhttp.send();
  }
  
  function delete_cart(id_cart_item) {
    if (!id_cart_item) return;
    const url = "<?= _WEB_ROOT ?>/app/controllers/ajax/delete_cart_item.php?id=" + encodeURIComponent(id_cart_item);
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
      console.log("Xoá khỏi server:", this.responseText);
    };
    xhttp.open("GET", url, true);
    xhttp.send();
  }

  capnhatThanhTien(); // khởi tạo lúc đầu
});






</script>
