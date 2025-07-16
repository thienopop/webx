
<div class="main_userinfo">
<h3>Thông tin cá nhân</h3>
<h4>Xin chào!</h4>
<p><b>Họ: </b><?= htmlspecialchars($data['first_name']) ?></p>
<p><b>Tên: </b><?= htmlspecialchars($data['last_name']) ?></p>
<p><b>Ngày sinh: </b><?= htmlspecialchars($data['date_of_birth']) ?></p>
<p><b>Giới tính: </b><?= htmlspecialchars($data['sex']) ?></p>
<p><b>Username: </b><?= htmlspecialchars($data['username']) ?></p>
<p><b>Gmail: </b><?= htmlspecialchars($data['email']) ?></p>
<p><b>Số điện thoại: </b><?= htmlspecialchars($data['phone_number']) ?></p>
<a href="chitiet_sanpham.html">Sửa</a>
</div>