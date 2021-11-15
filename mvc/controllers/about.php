<?php 
class About extends Controller {
    public function sayHi() {
        $this->view("master1", [
            "title"=>"About | Periphera",
            "page"=>"about",
        ]);
    }
}

?>
