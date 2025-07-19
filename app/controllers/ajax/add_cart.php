<?php
session_start(); // PHẢI bật session
require_once 'connectdb.php';

if (!isset($_SESSION['user'])) {
    die("Bạn chưa đăng nhập!");
}

$user_id = $_SESSION['user']['id']; 

if (isset($_GET['product_id']) && isset($_GET['sl'])) {
    $product_id = intval($_GET['product_id']);
    $sl = intval($_GET['sl']);

    if ($product_id <= 0 || $sl <= 0) {
        die("ID hoặc số lượng không hợp lệ");
    }

    $con = connect();

    // Lấy hoặc tạo giỏ hàng
    $sql1 = "SELECT id FROM carts WHERE user_id = $user_id";
    $result = $con->query($sql1);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cart_id = $row['id'];
    } else {
        $sql_create = "INSERT INTO carts(user_id) VALUES ($user_id)";
        if ($con->query($sql_create)) {
            $cart_id = $con->insert_id;
        } else {
            die("Không thể tạo giỏ hàng: " . $con->error);
        }
    }

    // Kiểm tra xem sản phẩm đã tồn tại trong giỏ chưa
    $check_sql = "SELECT id, quantity FROM cart_items WHERE cart_id = ? AND product_id = ?";
    $check_stmt = $con->prepare($check_sql);
    $check_stmt->bind_param("ii", $cart_id, $product_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result && $check_result->num_rows > 0) {
        // Nếu đã có -> cập nhật số lượng
        $row = $check_result->fetch_assoc();
        $new_quantity = $row['quantity'] + $sl;

        $update_sql = "UPDATE cart_items SET quantity = ? WHERE id = ?";
        $update_stmt = $con->prepare($update_sql);
        $update_stmt->bind_param("ii", $new_quantity, $row['id']);
        $update_stmt->execute();
        echo "Cập nhật số lượng sản phẩm trong giỏ hàng";
        $update_stmt->close();
    } else {
        // Nếu chưa có -> thêm mới
        $insert_sql = "INSERT INTO cart_items(cart_id, product_id, quantity) VALUES (?, ?, ?)";
        $insert_stmt = $con->prepare($insert_sql);
        $insert_stmt->bind_param("iii", $cart_id, $product_id, $sl);

        if ($insert_stmt->execute()) {
            echo "Đã thêm sản phẩm vào giỏ hàng";
        } else {
            echo "Lỗi khi thêm: " . $insert_stmt->error;
        }

        $insert_stmt->close();
    }

    $check_stmt->close();
    $con->close();
} else {
    echo "Thiếu ID hoặc số lượng";
}
