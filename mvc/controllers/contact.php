<?php 
class Contact extends Controller {
    public $contactModel;

    public function __construct() {
        $this->contactModel = $this->model('contactModel');
    }

    public function sayHi() {
        $info = [
            "title"=>"Contact | Periphera",
            "page"=>"contact"
        ];
        $data = [
            "fname"=>"",
            "lname"=>"",
            "message"=>"",
            "email"=>"",
            "emailError"=>""
        ];

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            // sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "fname"=>trim($_POST['fname']),
                "lname"=>trim($_POST['lname']),
                "message"=>trim($_POST['message']),
                "email"=>trim($_POST['email']),
                "emailError"=>""
            ];
            
            // validate email
            if ( json_decode($this->contactModel->contactCheckEmail($data["email"])) === "email_empty") {
                $data["emailError"] = "Please enter email address.";
            } elseif ( json_decode($this->contactModel->contactCheckEmail($data["email"])) === "email_invalid" ) {
                $data["emailError"] = "Please enter the correct email format.";
            }

            // check if all error is empty
            if ( empty($data['emailError']) ) {
                if ( $this->contactModel->sendMessage($data) ) {
                    $data['result'] = 'Message has been sent.';
                } else {
                    $data['result'] = 'Something went wrong, please try again';
                }
            } else {
                $data = [
                    "fname"=>"",
                    "lname"=>"",
                    "message"=>"",
                    "email"=>"",
                    "emailError"=>""
                ];
            }
        }


        $view_data = $info + $data;
        $this->view("master1", $view_data);
    }
}

?>
