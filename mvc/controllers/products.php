<?php 
class Products extends Controller {
    public $productsModel;

    public function __construct() {
        // fetch data with Models
        $this->productsModel = $this->model("productsModel");
    }
    public function sayHi() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST['sort'] == 1){
                $data = $this->productsModel->getDataSortByPrice();
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$data, 
                    "noti"=>$count
                ]);
            }
            else if($_POST['sort'] == 2){
                $data = $this->productsModel->getDataSortByRating();
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$data,
                    "noti"=>$count
                ]);
            }
            else if($_POST['sort'] == 0){
                $data = $this->productsModel->getData();
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$data,
                    "noti"=>$count
                ]);
            }
        }
        else{
            if(isset($_COOKIE['formselected'])){
                if($_COOKIE['formselected'] == 0){
                    $data = $this->productsModel->getData();
                }
                if($_COOKIE['formselected'] == 1){
                    $data = $this->productsModel->getDataSortByPrice();
                }
                if($_COOKIE['formselected'] == 2){
                    $data = $this->productsModel->getDataSortByRating();
                }
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$data,
                    "noti"=>$count
                ]);
            }
            else{
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$this->productsModel->getData(),
                    "noti"=>$count
                ]);
            }
        }
        
    }
    public function page($page) {

       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST['sort'] == 1){
                $data = $this->productsModel->getDataSortByPrice();
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$data,
                    "noti"=>$count
                ]);
            }
            else if($_POST['sort'] == 2){
                $data = $this->productsModel->getDataSortByRating();
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$data,
                    "noti"=>$count
                ]);
            }
            else if($_POST['sort'] == 0){
                $data = $this->productsModel->getData();
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$data,
                    "noti"=>$count
                ]);
            }
        }
        else{
            if(isset($_COOKIE['formselected'])){
                if($_COOKIE['formselected'] == 0){
                    $data = $this->productsModel->getData();
                }
                if($_COOKIE['formselected'] == 1){
                    $data = $this->productsModel->getDataSortByPrice();
                }
                if($_COOKIE['formselected'] == 2){
                    $data = $this->productsModel->getDataSortByRating();
                }
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$data,
                    "noti"=>$count
                ]);
            }
            else{
                $userID = $this->productsModel->getUserID($_SESSION["username"]);
                $data = json_decode($userID, true);
                $count = 0;
                foreach($data as $data){
                    $count = $this->productsModel->countNumberProductOfUser($data["id"]);
                }
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$this->productsModel->getData(),
                    "noti"=>$count
                ]);
            }
        }
    }

    public function product_detail($id){
        $userID = $this->productsModel->getUserID($_SESSION["username"]);
            $data = json_decode($userID, true);
            $count = 0;
            foreach($data as $data){
                $count = $this->productsModel->countNumberProductOfUser($data["id"]);
            }
        $this->view("master1", [
            "title"=>"Product Detail | Periphera",
            "page"=>"product-detail",
            "data"=>$this->productsModel->getProductDetail($id),
            "noti"=>$count,
            "comment"=>$this->productsModel->getComment($id)
        ]);
    }

    public function addtocart(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userID = $this->productsModel->getUserID($_SESSION["username"]);
            $data = json_decode($userID, true);
            $count = 0;
            foreach($data as $data){
                $this->productsModel->productSaveOrder($data["id"]);
                $count = $this->productsModel->countNumberProductOfUser($data["id"]);
            }
            $lastOrderID = $this->productsModel->getLastOrderID();
            $dataLastOrderID = json_decode($lastOrderID, true);
            foreach($dataLastOrderID as $dataLastOrderID){
                $this->productsModel->saveProductMount($dataLastOrderID["maxID"], $_POST["idProduct"], $_POST["numberProduct"]);
            }
            $this->view("master1", [
                "title"=>"Product Detail | Periphera",
                "page"=>"product-detail",
                "data"=>$this->productsModel->getProductDetail($_POST["idProduct"]),
                "comment"=>$this->productsModel->getComment($_POST["idProduct"]),
                "noti"=>$count
            ]);
        }

    }

    public function cart(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST["productMount"]) && isset($_POST["productIdUpdate"])){
                $this->productsModel->updateProdMount($_POST["productMount"], $_POST["productIdUpdate"]);
            }
            if(isset($_POST["productIdRemove"])){
                $this->productsModel->deleteOrder($_POST["productIdRemove"]);
            } 
            $userID = $this->productsModel->getUserID($_SESSION["username"]);
            $data = json_decode($userID, true);
                foreach($data as $data){
                    $temp = $data["id"];
                }
            $this->view("master1", [
                "title"=>"Product Detail | Periphera",
                "page"=>"cart",
                "data"=>$this->productsModel->getCart($temp)
            ]);
        }
        else{
            $userID = $this->productsModel->getUserID($_SESSION["username"]);
            $data = json_decode($userID, true);
                foreach($data as $data){
                    $temp = $data["id"];
                }
            $this->view("master1", [
                "title"=>"Product Detail | Periphera",
                "page"=>"cart",
                "data"=>$this->productsModel->getCart($temp)
            ]);
        }
        
    }

    public function comment(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $proId =  $_POST['prodID'];
            $cmt =  $_POST['addCmt'];
            $userID = $this->productsModel->getUserID($_SESSION["username"]);
            $data = json_decode($userID, true);
            foreach($data as $data){
                $temp = $data["id"];
            }
            $this->productsModel->addComment($temp, $proId, $cmt);
            $this->view("master1", [
                "title"=>"Product Detail | Periphera",
                "page"=>"product-detail",
                "data"=>$this->productsModel->getProductDetail($proId),
                "noti"=>$this->productsModel->countNumberProductOfUser(),
                "comment"=>$this->productsModel->getComment($proId)
            ]);
        }
        
    }

    public function ad_add_product(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $category =  $_POST['category'];
            $name =  $_POST['name'];
            $description = $_POST['description'];
            $price =  $_POST['price'];
            $img = $_POST['image'];
            $rating =  $_POST['rating'];
            $feature = $_POST['isFeatured'];
            echo $feature;
            $this->productsModel->ad_createProduct($category, $name, $description, $price, $img, $rating, $feature);
            $this->view("master3", [
                "title"=>"Dashboard | Products",
                "page"=>"admin_products",
                "qr_res"=>json_decode($this->productsModel->ad_getAllProduct(), true)
            ]);
        }
    }

    public function ad_edit_product(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['productId'];
            $category =  $_POST['category1'];
            $name =  $_POST['name1'];
            $description = $_POST['description1'];
            $price =  $_POST['price1'];
            $img = $_POST['image1'];
            $rating =  $_POST['rating1'];
            $feature = $_POST['isFeatured1'];
            $this->productsModel->ad_editProduct($id, $category, $name, $description, $price, $img, $rating, $feature);
            $this->view("master3", [
                "title"=>"Dashboard | Products",
                "page"=>"admin_products",
                "qr_res"=>json_decode($this->productsModel->ad_getAllProduct(), true)
            ]);
        }
    }

    public function ad_delete_product(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['productIdDelete'];
            $this->productsModel->ad_deleteProduct($id);
            $this->view("master3", [
                "title"=>"Dashboard | Products",
                "page"=>"admin_products",
                "qr_res"=>json_decode($this->productsModel->ad_getAllProduct(), true)
            ]);
        }
    }

    public function ad_delete_order(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['orderId'];
            $this->productsModel->ad_deleteOrder($id);
            $this->view("master3", [
                "title"=>"Dashboard | Orders",
                "page"=>"admin_orders",
                "qr_res"=>json_decode($this->productsModel->ad_getAllOrders(), true)
            ]);
        }
    }

}
?>
