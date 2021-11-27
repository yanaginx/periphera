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
        $qr = "INSERT INTO `order`(`user_id`, `date`) VALUES (?,CURRENT_TIMESTAMP())";
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
    public function countNumberProductOfUser($userId){
        $query = "SELECT COUNT(user_id) AS countID FROM `order` WHERE user_id = $userId";
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

    public function addComment($userId, $proId, $cmt){
        $cmt_encoded = htmlentities($cmt, ENT_QUOTES);
        $qr = "INSERT INTO `comment`(`user_id`, `product_id`, `comment`, `datetime`) VALUES (?,?,?,CURRENT_TIMESTAMP())";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('iis', $userId, $proId, $cmt_encoded);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function getComment($prodId){
        $qr = "SELECT `user_id`, `product_id`, `comment`, `datetime`, `username` FROM `comment`, `user` u 
        WHERE product_id = ? and user_id = u.id
        order by datetime desc";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('i', $prodId);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        $data_arr = array();
        while ( $row = $stmt_result->fetch_assoc() ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);  
    }

    public function ad_getAllProduct() {
        $qr = "SELECT `product`.name, `category`.name as category_name, description, date_added, price, rating, is_featured, `product`.id, `product`.image
                 FROM `product` JOIN `category` ON category_id = `category`.id;";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);        
    }

    public function ad_createProduct($category, $name, $description, $price, $image, $rating, $isFeatured) {
        $qr = "INSERT INTO `product`(`category_id`, `name`, `description`, `date_added`, `price`, `image`, `rating`, `is_featured`) 
            VALUES (?,?,?,
            CURRENT_TIMESTAMP(), ?,?, ?, ?);";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('sssisdi', $category, $name, $description, $price, $image, $rating, $isFeatured);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }
    public function ad_editProduct($id, $category, $name, $des, $price, $image, $rating, $feature) {
        $query = "UPDATE `product` SET `category_id`=?,`name`=?,`description`=?,`price`=?,`image`=?,`rating`=?,`is_featured`=? WHERE id = ?";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('sssisdii', $category, $name, $des, $price, $image, $rating, $feature, $id);
        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function ad_deleteProduct($id){
        $qr = "DELETE FROM `product` WHERE id = ?;";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('i', $id);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function ad_getAllOrders() {
        $qr = "SELECT `order`.id, `user`.username, `order`.date, `product`.name, `order_contains_products`.prod_amount
        FROM `order` JOIN `order_contains_products`
          ON `order`.id = `order_contains_products`.order_id
                     JOIN `user`
          ON `order`.user_id = `user`.id
                     JOIN `product`
          ON `order_contains_products`.product_id = `product`.id;";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);        
    }

    public function ad_deleteOrder($orderId){
        $qr = "DELETE FROM `order` WHERE id = ?;";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('i', $orderId);

        $qr2 = "DELETE FROM `order_contains_products` WHERE order_id = ?;";
        $stmt2 = $this->con->prepare($qr2);
        $stmt2->bind_param('i', $userId);

        if ( $stmt->execute() && $stmt2->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function ad_countProduct() {
        $qr = "SELECT COUNT(*) as count FROM `product`";
        $rows =  mysqli_query($this->con, $qr);
        $row = mysqli_fetch_assoc($rows);
        return json_encode($row); 
    }

    public function ad_countOrder() {
        $qr = "SELECT COUNT(*) as count FROM `order`";
        $rows =  mysqli_query($this->con, $qr);
        $row = mysqli_fetch_assoc($rows);
        return json_encode($row); 
    }

    public function ad_getAllComments() {
        $qr = "SELECT `comment`.id, `comment`.comment, `comment`.datetime, `product`.name, `user`.username
        FROM `comment` JOIN `product`
          ON `comment`.product_id = `product`.id
                     JOIN `user`
          ON `comment`.user_id = `user`.id;";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }

    public function ad_deleteComment($cmtId){
        $qr = "DELETE FROM `comment` WHERE id = ?;";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('i', $cmtId);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function getFeaturedProduct() {
        $qr = "SELECT * FROM `product` WHERE `is_featured` = 1 ORDER BY RAND() LIMIT 1;";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);
    }
}

?>