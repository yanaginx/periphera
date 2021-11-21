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
        $qr = "SELECT * FROM product WHERE id = $id";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }
    public function getUserID($username){
        $qr = "SELECT id FROM user WHERE username = '$username'";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
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
        $query = "INSERT INTO `order`(`user_id`, `date`) VALUES ('$username',DATE(NOW()))";
        if ( $this->con->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function saveProductMount($orderId, $proId, $proMount) {
        $query = "INSERT INTO `order_contains_products`(`order_id`, `product_id`, `prod_amount`) VALUES ('$orderId','$proId','$proMount')";
        if ( $this->con->query($query)) {
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
        $query = "SELECT * FROM `order_contains_products`, `order` o, `product` p WHERE o.id = order_id AND p.id = product_id AND o.user_id = $userId";
        $rows =  mysqli_query($this->con, $query);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }

    public function deleteOrder($orderId){
        $query = "DELETE FROM `order_contains_products` WHERE order_id = $orderId";
        $query1 = "DELETE FROM `order` WHERE id = $orderId";
        if ( $this->con->query($query) && $this->con->query($query1)) {
            return true;
        } else {
            return false;
        }
    }

    public function updateProdMount($prodMount, $orderId){
        $query = "UPDATE `order_contains_products` SET `prod_amount`='$prodMount' WHERE order_id=$orderId";
        if ( $this->con->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}

?>