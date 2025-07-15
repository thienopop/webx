<?php
class UsersModel extends Model {

    public function getInfo($id) {


       $sql = "SELECT first_name, last_name, date_of_birth, sex, username, email, phone_number FROM users WHERE id = $id;";

        $result = $this->conn->query($sql);

        $user=null;
        $row = $result->fetch_assoc();
        if ($row) {
            $user = $row;}
        
        // }
        //   while ($row = $result->fetch_assoc()) {
        //     $user[] = $row;
        // }

        $result->free();
        $this->conn->close();
        return $user;
    }
}