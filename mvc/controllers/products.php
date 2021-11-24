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
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$data, 
                    "noti"=>$this->productsModel->countNumberProductOfUser()
                ]);
            }
            else if($_POST['sort'] == 2){
                $data = $this->productsModel->getDataSortByRating();
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$data,
                    "noti"=>$this->productsModel->countNumberProductOfUser()
                ]);
            }
            else if($_POST['sort'] == 0){
                $data = $this->productsModel->getData();
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$data,
                    "noti"=>$this->productsModel->countNumberProductOfUser()
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
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$data,
                    "noti"=>$this->productsModel->countNumberProductOfUser()
                ]);
            }
            else{
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>1,
                    "data"=>$this->productsModel->getData(),
                    "noti"=>$this->productsModel->countNumberProductOfUser()
                ]);
            }
        }
        
    }
    public function page($page) {

       if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST['sort'] == 1){
                $data = $this->productsModel->getDataSortByPrice();
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$data,
                    "noti"=>$this->productsModel->countNumberProductOfUser()
                ]);
            }
            else if($_POST['sort'] == 2){
                $data = $this->productsModel->getDataSortByRating();
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$data,
                    "noti"=>$this->productsModel->countNumberProductOfUser()
                ]);
            }
            else if($_POST['sort'] == 0){
                $data = $this->productsModel->getData();
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$data,
                    "noti"=>$this->productsModel->countNumberProductOfUser()
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
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$data,
                    "noti"=>$this->productsModel->countNumberProductOfUser()
                ]);
            }
            else{
                $this->view("master1", [
                    "title"=>"Products | Periphera",
                    "page"=>"products",
                    "numberPage"=>"".$page,
                    "data"=>$this->productsModel->getData(),
                    "noti"=>$this->productsModel->countNumberProductOfUser()
                ]);
            }
        }
    }

    public function product_detail($id){
        $this->view("master1", [
            "title"=>"Product Detail | Periphera",
            "page"=>"product-detail",
            "data"=>$this->productsModel->getProductDetail($id),
            "noti"=>$this->productsModel->countNumberProductOfUser(),
            "comment"=>$this->productsModel->getComment($id)
        ]);
    }

    public function addtocart(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userID = $this->productsModel->getUserID($_SESSION["username"]);
            $data = json_decode($userID, true);
            foreach($data as $data){
                $this->productsModel->productSaveOrder($data["id"]);
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
                "noti"=>$this->productsModel->countNumberProductOfUser()
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

}
?>
