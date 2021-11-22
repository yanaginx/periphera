<?php 

class Admin extends Controller {

    public $userModel;
    public $productsModel;

    public function __construct() {
        $this->userModel = $this->model('userModel');
        $this->productsModel = $this->model('productsModel');
    }

    public function sayHi() {
        $info = [
            "title"=>"Dashboard",
            "page"=>"admin"
        ];
        $data = [];
        
        $view_data = $info + $data;
        $this->view("master3", $view_data);
    }

    public function products() {
        $info = [
            "title"=>"Dashboard | Products",
            "page"=>"admin_products"
        ];
        $data = [];
        
        // fetching all product data
        $qr_res = json_decode($this->productsModel->ad_getAllProduct(), true);

        $data = [
            "qr_res"=>$qr_res
        ];
        
        $view_data = $info + $data;
        $this->view("master3", $view_data);
    }

    public function users() {
        $info = [
            "title"=>"Dashboard | Users",
            "page"=>"admin_users"
        ];
        $data = [];

        
        $view_data = $info + $data;
        $this->view("master3", $view_data);
    }

    public function orders() {
        $info = [
            "title"=>"Dashboard | Orders",
            "page"=>"admin_orders"
        ];
        $data = [];

        
        $view_data = $info + $data;
        $this->view("master3", $view_data);
    }

    public function news() {
        $info = [
            "title"=>"Dashboard | News",
            "page"=>"admin_news"
        ];
        $data = [];

        
        $view_data = $info + $data;
        $this->view("master3", $view_data);
    }

    public function messages() {
        $info = [
            "title"=>"Dashboard | Messages",
            "page"=>"admin_messages"
        ];
        $data = [];

        
        $view_data = $info + $data;
        $this->view("master3", $view_data);
    }
}
?>