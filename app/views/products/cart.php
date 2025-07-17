
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
<tr data-cartid="<?= $sp['id'] ?>">
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
        update_sl_cart(btn.closest("tr").getAttribute("data-cartid"), sl.value);
        // Cập nhật thành tiền nếu mục này được chọn

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
          update_sl_cart(btn.closest("tr").getAttribute("data-cartid"), sl.value);
       
          if (btn.closest("tr").querySelector(".main_giohang_chon_sanpham").checked) {

            capnhatThanhTien();
          }
        }
      });
    });

    nutXoa.forEach(function (btn) {
      btn.addEventListener("click", function () {
        const cartId_item = btn.closest("tr").getAttribute("data-cartid");
        if (cartId_item) {
          delete_cart(cartId_item);
        }
        // Xoá dòng khỏi bảng
        // btn.closest("tr").remove();
        // Cập nhật thành tiền
        btn.closest("tr").remove();
        capnhatThanhTien();
      });
    });

    nutChon.forEach(function (checkbox) {
      checkbox.addEventListener("change", function () {
        capnhatThanhTien();

// update_sl_cart(4,8);

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


// function update_sl_cart(id_cart_item, sl) {
//   console.log("Gửi cập nhật: ", id_cart_item, sl); // Thêm dòng này để test

//   if (!id_cart_item || isNaN(id_cart_item) || !sl || isNaN(sl)) return;

//   fetch(/app/controllers/ajax/update_sl_cart_item.php?id=${id_cart_item}&sl=${sl}`)
//     .then(response => response.text())
//     .then(data => {
//       console.log("Server trả về:", data); // Test phản hồi
//     })
//     .catch(error => console.error("Lỗi khi cập nhật:", error));

// }

function update_sl_cart(id_cart_item, sl) {
  console.log("Cập nhật giỏ hàng có ID:", id_cart_item);

  // Kiểm tra dữ liệu hợp lệ
  if (!id_cart_item || !sl) {
    console.warn("Thiếu ID hoặc số lượng!");
    return;
  }

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    console.log("Cập nhật thành công sản phẩm có ID:", id_cart_item);
    console.log("Phản hồi từ server:", this.responseText);
  };

  // Sử dụng dấu nháy kép và template string (``) cho biến trong URL
  const url = `<?= _WEB_ROOT ?>/app/controllers/ajax/update_sl_cart_item.php?id=${encodeURIComponent(id_cart_item)}&sl=${encodeURIComponent(sl)}`;
  xhttp.open("GET", url, true);
  xhttp.send();
}

function update_sl_cart(id_cart_item, sl) {
  console.log("Cập nhật giỏ hàng có ID:", id_cart_item);

  if (!id_cart_item || !sl) return;

  const xhttp = new XMLHttpRequest();
  xhttp.onload = function () {
    console.log("Phản hồi từ server:", this.responseText);
  };

  const url = "<?= _WEB_ROOT ?>/app/controllers/ajax/update_sl_cart_item.php?id=" + encodeURIComponent(id_cart_item) + "&sl=" + encodeURIComponent(sl);
  xhttp.open("GET", url, true);
  xhttp.send();
}



</script>


  
