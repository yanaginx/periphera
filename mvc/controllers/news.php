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
        $this->view("master4", [
            "title"=>"Article's content",
            "page"=>"news",
            "article"=>$this->newsModel->getArticle($id)
        ]);
    }

    public function ad_Add(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title =  $_POST['title'];
            $content =  $_POST['content'];
            $image = $_POST['image'];

            $this->newsModel->ad_addArticle($title, $content, $image);
            $this->view("master3", [
                "title"=>"Dashboard | News",
                "page"=>"admin_news",
                "qr_res"=>json_decode($this->newsModel->ad_getAllArticles(), true)
            ]);
        }
    }

    public function ad_Edit(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $newsId =  $_POST['newsId'];
            $title =  $_POST['title'];
            $content =  $_POST['content'];
            $image = $_POST['image'];

            $this->newsModel->ad_editArticle($newsId, $title, $content, $image);
            $this->view("master3", [
                "title"=>"Dashboard | News",
                "page"=>"admin_news",
                "qr_res"=>json_decode($this->newsModel->ad_getAllArticles(), true)
            ]);
        }
    }

    public function ad_Delete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $newsId =  $_POST['newsId'];

            $this->newsModel->ad_deleteArticle($newsId);
            $this->view("master3", [
                "title"=>"Dashboard | News",
                "page"=>"admin_news",
                "qr_res"=>json_decode($this->newsModel->ad_getAllArticles(), true)
            ]);
        }
    }
    
}

?>
