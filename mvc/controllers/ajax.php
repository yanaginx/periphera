<?php 
// using ajax
class Ajax extends Controller {

    public $userModel;
    public $contactModel;

    public function __construct() {
        $this->userModel = $this->model('userModel');
        $this->contactModel = $this->model('contactModel');
    }

    public function regCheckUsername() {
        // sanitize input
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $username = $_POST["username"];
        echo $this->userModel->regCheckUsername($username);
    }
    public function regCheckPassword() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = $_POST["password"];
        echo $this->userModel->regCheckPassword($password);
    }
    public function regCheckConfirmPassword() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        echo $this->userModel->regCheckConfirmPassword($password, $confirmPassword);
    }
    public function regCheckEmail() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email = $_POST["email"];
        echo $this->userModel->regCheckEmail($email);
    }

    public function contactCheckEmail() {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $email = $_POST["email"];
        echo $this->contactModel->contactCheckEmail($email);
    }

}

?>