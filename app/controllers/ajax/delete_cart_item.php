 <?php
// require_once 'connectdb.php';
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



if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // ép kiểu để tránh injection
    $con = connect(); // gọi sau khi kiểm tra ID

    $sql = "DELETE FROM cart_items WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "Đã xóa thành công mục trong giỏ hàng (ID = $id)";
    } else {
        echo "Lỗi khi xóa: " . $con->error;
    }

    $con->close();
} else {
    echo "Thiếu ID cần xóa.";
}
?>
