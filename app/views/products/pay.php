

  <div class="main_pay">
    
      <table>
        <tr>
          <th>Hình ảnh</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
          <th>Giá</th>
            <th>Thành tiền</th>
        </tr>


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
