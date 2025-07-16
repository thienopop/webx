
  <div class="main_giohang">
    
      <table>
        <tr>
          <th>Chọn</th>
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
<tr>
    <td><input class="main_giohang_chon_sanpham" type="checkbox" style="width: 20px; height: 20px;"></td>
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



<!-- 


        <tr>
          <td><input class="main_giohang_chon_sanpham" type="checkbox" style="width: 20px; height: 20px;" /></td>
          <td><img class="main_giohang_anh_mota" src="thongbao.jpg" alt="thông báo" /></td>
          <td>Chan nước năm</td>
          <td>
            <input type="button" class="main_giohang_giam_soluong" value="-" />
            <input style="width: 70px;" readonly class="main_giohang_soluong_sanpham" type="number" value="1" />
            <input type="button" class="main_giohang_tang_soluong" value="+" />
          </td>
          <td data-gia="200" class="main_giohang_gia">200$</td>
          <td><input type="button" class="main_giohang_xoa_khoigiohang" value="Xoá" /></td>
        </tr>

    
        <tr>
          <td><input class="main_giohang_chon_sanpham" type="checkbox" style="width: 20px; height: 20px;" /></td>
          <td><img class="main_giohang_anh_mota" src="thongbao.jpg" alt="thông báo" /></td>
          <td>Chan nước năm</td>
          <td>
            <input type="button" class="main_giohang_giam_soluong" value="-" />
            <input style="width: 70px;" readonly class="main_giohang_soluong_sanpham" type="number" value="1" />
            <input type="button" class="main_giohang_tang_soluong" value="+" />
          </td>
          <td data-gia="200" class="main_giohang_gia">200$</td>
          <td><input type="button" class="main_giohang_xoa_khoigiohang" value="Xoá" /></td>
        </tr>

       
        <tr>
          <td><input class="main_giohang_chon_sanpham" type="checkbox" style="width: 20px; height: 20px;" /></td>
          <td><img class="main_giohang_anh_mota" src="thongbao.jpg" alt="thông báo" /></td>
          <td>Chan nước năm</td>
          <td>
            <input type="button" class="main_giohang_giam_soluong" value="-" />
            <input style="width: 70px;" readonly class="main_giohang_soluong_sanpham" type="number" value="1" />
            <input type="button" class="main_giohang_tang_soluong" value="+" />
          </td>
          <td data-gia="200" class="main_giohang_gia">200$</td>
          <td><input type="button" class="main_giohang_xoa_khoigiohang" value="Xoá" /></td>
        </tr>
-->
    

    <div class="main_giohang_div_thanhtoan">
      <p style="font-size: 30px;">Thành tiền: <span class="main_giohang_thanh_tien">0 VND</span></p>
      <input id="main_giohang_thanhtoan" type="button" value="Thanh toán" disabled />
    </div>
  </div>

  <script>
    const nutXoa = document.querySelectorAll(".main_giohang_xoa_khoigiohang");
    const nutTang = document.querySelectorAll(".main_giohang_tang_soluong");
    const nutGiam = document.querySelectorAll(".main_giohang_giam_soluong");
    const nutChon = document.querySelectorAll(".main_giohang_chon_sanpham");

    nutTang.forEach(function (btn) {
      btn.addEventListener("click", function () {
        const td = btn.closest("td");
        const sl = td.querySelector(".main_giohang_soluong_sanpham");
        sl.value = parseInt(sl.value) + 1;
        if (btn.closest("tr").querySelector(".main_giohang_chon_sanpham").checked) {
          capnhatThanhTien();
        }
      });
    });

    nutGiam.forEach(function (btn) {
      btn.addEventListener("click", function () {
        const td = btn.closest("td");
        const sl = td.querySelector(".main_giohang_soluong_sanpham");
        if (parseInt(sl.value) > 1) {
          sl.value = parseInt(sl.value) - 1;
          if (btn.closest("tr").querySelector(".main_giohang_chon_sanpham").checked) {
            capnhatThanhTien();
          }
        }
      });
    });

    nutXoa.forEach(function (btn) {
      btn.addEventListener("click", function () {
        btn.closest("tr").remove();
        capnhatThanhTien();
      });
    });

    nutChon.forEach(function (checkbox) {
      checkbox.addEventListener("change", function () {
        capnhatThanhTien();
      });
    });

    function capnhatThanhTien() {
      let tong = 0;
      document.querySelectorAll(".main_giohang_chon_sanpham").forEach(function (chon) {
        if (chon.checked) {
          const tr = chon.closest("tr");
          const soLuong = parseInt(tr.querySelector(".main_giohang_soluong_sanpham").value);
          const gia = parseFloat(tr.querySelector(".main_giohang_gia").dataset.gia);
          tong += soLuong * gia;
        }
      });

      const thanhTienEl = document.querySelector(".main_giohang_thanh_tien");
      thanhTienEl.textContent = tong.toLocaleString() + " VND";

      const nutThanhToan = document.getElementById("main_giohang_thanhtoan");
      if (tong > 0) {
        nutThanhToan.style.backgroundColor = "red";
        nutThanhToan.disabled = false;
      } else {
        nutThanhToan.style.backgroundColor = "white";
        nutThanhToan.disabled = true;
      }
    }

    // Khởi tạo khi load
    window.addEventListener("DOMContentLoaded", capnhatThanhTien);
  </script>
