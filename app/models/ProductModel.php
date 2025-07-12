
<?php

class ProductModel extends Model {

    public function getList() {
        $sql = "SELECT id, name, price, description, image_url, stock FROM products;";
        $result = $this->conn->query($sql);

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }

        $result->free();
        return $products;
    }

   public function getDetail($id) {
    $id = (int)$id; // Ép kiểu để tránh SQL Injection cơ bản
    $sql = "SELECT id, name, price, description, image_url, stock FROM products WHERE id = $id";
    $result = $this->conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Lấy dòng đầu tiên
        return $row; // Trả về chi tiết 1 sản phẩm
    }

    return null; // Không có sản phẩm nào
}




}
