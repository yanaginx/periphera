<?php 
class Controller {

    public function model($model) {
        require_once "./mvc/models/".$model.".php";
        return new $model;
    }

    public function view($view, $data=[]) {
        // this controller included both the content of the view
        // and the data's value
        // so the view can actually call the data since it is
        // parts of the big controller object
        // liek $view and $data are under same scope
        require_once "./mvc/views/".$view.".php";
    }
}
?>