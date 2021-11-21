<?php 

class Admin extends Controller {

    public $userModel; 

    public function __construct() {
        $this->userModel = $this->model('userModel');
    }

    public function sayHi() {
        $info = [
            "title"=>"Dashboard",
            "page"=>"home"
        ];
        $data = [];
        
        $view_data = $info + $data;
        // default action is login
        $this->view("master3", $view_data);
    }
}
?>