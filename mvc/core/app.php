<?php 
class App {
    // http://localhost/periphera/home/sayHi/1/23
    protected $controller = "home";
    protected $action = "sayHi";
    protected $params = [];

    function __construct() {
        // Array ( [0] => home [1] => sayHi [2] => 1 [3] => 23 )
        $arr = $this->urlProcess();

        // controller process
        if ( isset($arr) ) {
            if ( file_exists("./mvc/controllers/".$arr[0].".php") ) {
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        require_once "./mvc/controllers/".$this->controller.".php";
        // either using the below with the * or -->
        // $this->controller = new $this->controller; 

        // action process
        if ( isset($arr[1]) ) {
            if ( method_exists($this->controller, $arr[1]) ) {
                if (!($arr[1] == 'model' || $arr[1] == 'view'))
                    $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        
        // param process 
        $this->params = $arr? array_values($arr) : [];

        // --> using the below works fine
        call_user_func_array([new $this->controller, $this->action], $this->params);
        // * here
        // call_user_func_array([$this->controller, $this->action], $this->params);
    }

    function urlProcess() {
        if ( isset($_GET["url"]) ) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>