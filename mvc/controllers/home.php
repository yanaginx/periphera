<?php 
class Home extends Controller{
    
    public function __construct() {
        // Model
        $this->productsModel = $this->model("productsModel");
    }

    function sayHi() {
        // add view here
        $info = [
            "title"=>"Periphera | Ecommerce Website",
            "page"=>"home"
        ];
        $featuredProduct = $this->productsModel->getFeaturedProduct();

        $data = [
            "featuredProduct"=>$featuredProduct
        ];
        $view_data = $info + $data;

        $this->view("master2", $view_data);
    }
}
?>
