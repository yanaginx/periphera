<?php 
class Home extends Controller{
    
    public function __construct() {
        // Model
    }


    function sayHi() {
        // add view here
        $this->view("master1", [
            "title"=>"Periphera | Ecommerce Website",
            "page"=>"home",
        ]);
    }
}
?>
