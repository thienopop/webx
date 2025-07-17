

<?php
function connect() {
    $host = "localhost";
    $username = "thien";
    $password = "weby";
    $database = "webx";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Kết nối thất bại: " . $conn->connect_error);
    }
    return $conn;
}
if (isset($_GET['id']) && isset($_GET['sl'])) {
    $id = intval($_GET['id']);
    $sl = intval($_GET['sl']);

    $con = connect(); // gọi sau khi kiểm tra ID

    $sql = "UPDATE cart_items SET quantity = $sl WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "Đã cập thành công mục trong giỏ hàng (ID = $id)";
    } else {
        echo "Lỗi khi update: " . $con->error;
    }

    $con->close();
} else {
    echo "Thiếu ID cần update";
}
?>
