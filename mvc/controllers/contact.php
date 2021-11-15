<?php 
class Contact extends Controller {
    public function sayHi() {
        $this->view("master1", [
            "title"=>"Contact | Periphera",
            "page"=>"contact",
        ]);
    }
}

?>
