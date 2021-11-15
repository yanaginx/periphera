<?php 
// using ajax
class Ajax extends Controller {

    public $userModel;

    public function __construct() {
        $this->userModel = $this->model('userModel');
    }

    public function regCheckUsername() {
        $username = $_POST["username"];
        echo $this->userModel->regCheckUsername($username);
    }
    public function regCheckPassword() {
        $password = $_POST["password"];
        echo $this->userModel->regCheckPassword($password);
    }
    public function regCheckConfirmPassword() {
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirmPassword"];
        echo $this->userModel->regCheckConfirmPassword($password, $confirmPassword);
    }
    public function regCheckEmail() {
        $email = $_POST["email"];
        echo $this->userModel->regCheckEmail($email);
    }            

}

?>