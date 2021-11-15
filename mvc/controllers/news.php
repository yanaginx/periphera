<?php 
class News extends Controller{

    public $newsModel;

    public function __construct() {
        // fetch data with Models
        $this->newsModel = $this->model("newsModel");
    }

    function sayHi() {
        // view data with Views
        $this->view("master1", [
            "title"=>"News | Periphera Ecommerce Website",
            "page"=>"news",
            "articles"=>$this->newsModel->getAllArticles()
        ]);
    }

    function details($id) {
        // view the articles
        $this->view("master2", [
            "title"=>"Article's content",
            "page"=>"news",
            "article"=>$this->newsModel->getArticle($id)
        ]);
    }
}

?>
