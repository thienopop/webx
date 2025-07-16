<?php
class CartsModel extends Model {

    public function get_carts($id) {


       $sql = "
       SELECT cart_items.id, cart_items.quantity, products.name, products.price, products.image_url, products.stock 
FROM cart_items 
JOIN products ON cart_items.product_id = products.id
JOIN carts ON cart_items.cart_id = carts.id
JOIN users ON carts.user_id = users.id
WHERE users.id = $id;";

        $result = $this->conn->query($sql);

 $carts= [];
        while ($row = $result->fetch_assoc()) {
            $carts[] = $row;
        }
        $result->free();
        $this->conn->close();
        if (empty($carts)) {
            return null; // Trả về null nếu không có sản phẩm trong giỏ hàng
        }
        
        // }
        //   while ($row = $result->fetch_assoc()) {
        //     $user[] = $row;
        // }

       
        return $carts;
    }

    
}