<?php 
class ProductsModel extends DB {

    public function getData() {
        $qr = "SELECT * FROM product";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }
    public function getDataSortByPrice() {
        $qr = "SELECT * FROM product ORDER BY price DESC";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }
    public function getDataSortByRating() {
        $qr = "SELECT * FROM product ORDER BY rating DESC";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }

    public function getProductDetail($id){
        $qr = "SELECT * FROM product WHERE id = ?;";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        $data_arr = array();
        while ( $row = $stmt_result->fetch_assoc() ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }
    public function getUserID($username){
        $qr = "SELECT id FROM user WHERE username = ?;";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        $data_arr = array();
        while ( $row = $stmt_result->fetch_assoc() ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }
    public function getLastOrderID(){
        $qr = "SELECT max(id) as maxID FROM `order` WHERE 1";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }
    public function productSaveOrder($username) {
        $qr = "INSERT INTO `order`(`user_id`, `date`) VALUES (?,DATE(NOW()))";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('s', $username);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function saveProductMount($orderId, $proId, $proMount) {
        $qr = "INSERT INTO `order_contains_products`(`order_id`, `product_id`, `prod_amount`) VALUES (?,?,?);";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('iii', $orderId, $proId, $proMount);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }
    public function countNumberProductOfUser(){
        $query = "SELECT COUNT(user_id) AS countID FROM `order` WHERE 1";
        $rows =  mysqli_query($this->con, $query);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }

    public function getCart($userId){
        $qr = "SELECT * FROM `order_contains_products`, `order` o, `product` p WHERE o.id = order_id AND p.id = product_id AND o.user_id = ?;";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('i', $userId);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        $data_arr = array();
        while ( $row = $stmt_result->fetch_assoc() ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }

    public function deleteOrder($orderId){
        $query = "DELETE FROM `order_contains_products` WHERE order_id = ?;";
        $query1 = "DELETE FROM `order` WHERE id = ?;";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('i', $orderId);
        $stmt1 = $this->con->prepare($query1);
        $stmt1->bind_param('i', $orderId);

        if ( $stmt->execute() && $stmt1->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProdMount($prodMount, $orderId){
        $query = "UPDATE `order_contains_products` SET `prod_amount`=? WHERE order_id=?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('ii', $prodMount, $orderId);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function ad_getAllProduct() {
        $qr = "SELECT `product`.name, `category`.name as category_name, description, date_added, price, rating, is_featured 
                 FROM `product` JOIN `category` ON category_id = `category`.id;";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);        
    }

    public function ad_createProduct() {
        // TODO
    }
    public function ad_editProduct($id) {
        // TODO
    }
}

?>