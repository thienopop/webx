

<h3>Thông tin cá nhân</h3>
<h4>Xin chào!</h4>
<p>Họ: <?= htmlspecialchars($data['first_name']) ?></p>
<p>Tên: <?= htmlspecialchars($data['last_name']) ?></p>
<p>Ngày sinh: <?= htmlspecialchars($data['date_of_birth']) ?></p>
<p>Giới tính: <?= htmlspecialchars($data['sex']) ?></p>
<p>Username: <?= htmlspecialchars($data['username']) ?></p>
<p>Gmail:<?= htmlspecialchars($data['email']) ?></p>
<p>Số điện thoại: <?= htmlspecialchars($data['phone_number']) ?></p>
<a href="chitiet_sanpham.html">Sửa</a>