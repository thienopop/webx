  <div class="main_sanpham">
            <div class="danh_muc_sanpham"></div>
            <div class="khung_sanpham">

<?php if (isset($data) && is_array($data)): ?>
    <?php foreach ($data as $product): ?>
       
                <div class="display_sanpham">
                    <img src="<?= htmlspecialchars($product['image_url']) ?>" alt="Ảnh sản phẩm">
                    <p><b><?= htmlspecialchars($product['name']) ?></b></p>
                    <!-- <p>Mô tả: <?= htmlspecialchars($product['description']) ?></p> -->
                    <p>Giá: <?= number_format($product['price'], 0, ',', '.') ?>₫</p>
                    <!-- <p>Kho: <?= $product['stock'] ?></p> -->
                    <input type="button" class="main_sanphamMua" data-id="<?= $product['id'] ?>" value="Mua ngay">
                </div>
    <?php endforeach; ?>
<?php else: ?>
    <p>Không có sản phẩm nào để hiển thị.</p>
<?php endif; ?> 



            </div>
        </div>

        <script>


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
        </script>

