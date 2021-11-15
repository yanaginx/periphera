<?php 
class Products extends Controller {
    public function sayHi() {
        $this->view("master1", [
            "title"=>"Products | Periphera",
            "page"=>"products"
        ]);
    }
}
?>
