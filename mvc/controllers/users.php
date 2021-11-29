<?php 

class Users extends Controller {
    public $userModel;

    public function __construct() {
        $this->userModel = $this->model('userModel');
    }

    public function sayHi() {
        $info = [
            "title"=>"Sign in",
            "page"=>"login"
        ];
        $data = [
            "username"=>'',
            "password"=>'',
            "usernameError"=>'',
            "passwordError"=>''
        ];
        
        $view_data = $info + $data;
        // default action is login
        $this->view("master1", $view_data);
    }

    public function login() {
        $info = [
            "title"=>"Sign in",
            "page"=>"login"
        ];
        $data = [
            "username"=>'',
            "password"=>'',
            "usernameError"=>'',
            "passwordError"=>''
        ];

        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            // sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if(isset($_POST["username"]) && isset($_POST["password"])){
                $data = [
                    "username"=>trim($_POST['username']),
                    "password"=>trim($_POST['password']),
                    "usernameError"=>'',
                    "passwordError"=>''
                ];
                
                // validate username 
                if ( empty($data['username']) ) {
                    $data['usernameError'] = 'Please enter a username.';
                }
    
                // validate password
                if ( empty($data['password']) ) {
                    $data['passwordError'] = 'Please enter a password.';
                }
    
                // check if all error is empty
                if ( empty($data['usernameError']) && 
                     empty($data['passwordError']) ) {
    
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);
                    if ( $loggedInUser ) {
                        $this->createUserSessions( json_decode($loggedInUser, true) );
                    } else {
                        $data['result'] = 'Password or user is incorrect. Please try again.';
                    }
                } else {
                    $data = [
                        "username"=>'',
                        "password"=>'',
                        "usernameError"=>'',
                        "passwordError"=>''
                    ];
                }
            }
            
        }


        $view_data = $info + $data;
        $this->view("master1", $view_data);
    }

    public function createUserSessions($data) {
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        if ($_SESSION['role'] == 'admin') {
            header('location: ../admin');
        }
        else {
            header('location: ..');
        }
    }

    public function logout() {
        unset($_SESSION['username']);
        unset($_SESSION['role']);
        header('location: ./login');
    }

    public function register() {
        $info = [
            "title"=>"Create an account",
            "page"=>"register"
        ];

        $data = [
            "username"=>'',
            "password"=>'',
            "confirmPassword"=>'',
            "email"=>'',
            "usernameError"=>'',
            "confirmPasswordError"=>'',
            "passwordError"=>'',
            "emailError"=>''
        ];
        
        if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
            // sanitize post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            if ( isset($_POST['btnRegister']) ) {
                $data = [
                    "username"=>trim($_POST["username"]),
                    "password"=>trim($_POST["password"]),
                    "confirmPassword"=>trim($_POST["confirmPassword"]),
                    "email"=>trim($_POST["email"]),
                    "usernameError"=>'',
                    "passwordError"=>'',
                    "confirmPasswordError"=>'',
                    "emailError"=>''
                ];
                
                // validate username on letters/numbers
                if ( json_decode($this->userModel->regCheckUsername($data["username"])) === "un_existed" ) {
                    $data["usernameError"] = "Username existed";
                } elseif ( json_decode($this->userModel->regCheckUsername($data["username"])) === "un_invalid" ) {
                    $data["usernameError"] = "Username is at least 3 characters long, can only contain letters and numbers.";
                }

                // validate email
                if ( json_decode($this->userModel->regCheckEmail($data["email"])) === "email_empty") {
                    $data["emailError"] = "Please enter email address.";
                } elseif ( json_decode($this->userModel->regCheckEmail($data["email"])) === "email_invalid" ) {
                    $data["emailError"] = "Please enter the correct email format.";
                } elseif ( json_decode($this->userModel->regCheckEmail($data["email"])) === "email_existed" ) {
                    $data["emailError"] = "Email existed";
                }

                // validate password
                if ( json_decode($this->userModel->regCheckPassword($data["password"])) === "passwd_invalid" ) {
                    $data["passwordError"] = "Password must have at least 1 letter, 1 numeric character, 1 special character and 1 uppercase letter.";
                }

                // validate confirm password
                if ( json_decode($this->userModel->regCheckConfirmPassword($data["password"], $data["confirmPassword"])) === "confirmPasswd_empty" ) {
                    $data["confirmPasswordError"] = "Please re-enter your password here.";
                } elseif ( json_decode( $this->userModel->regCheckConfirmPassword($data["password"], $data["confirmPassword"]) ) === "confirmPasswd_notmatch" ){
                    $data["confirmPasswordError"] = "Password do not match, please try again.";
                }

                // Check if all the errors are empty
                if ( empty($data['usernameError']) && 
                    empty($data['emailError']) && 
                    empty($data['confirmPasswordError']) && 
                    empty($data['passwordError']) ) {
                    
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // register user from model function
                    if ($this->userModel->register($data)) {
                        // display the message
                        $data['result'] = "Registration successfully";
                        // $view_data = $info + $data;
                        // $this->view("master1", $view_data);
                    } else {
                        $data['result'] = "Registration failed";
                        // $view_data = $info + $data;
                        // $this->view("master1", $view_data);
                    }
                }
            }
        }

        $view_data = $info + $data;
        $this->view("master1", $view_data);
    }

    public function details() {
        $info = [
            "title"=>"Details",
            "page"=>"details"
        ];

        $data = [
            "id"=>'',
            "username"=>'',
            "fname"=>'',
            "lname"=>'',
            "email"=>'',
            "phone"=>'',
            "address_1"=>'',
            "address_2"=>'',
            "zipcode"=>'',
            "country"=>''
        ];

        if(isset($_POST['saveuser'])){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                "fname" => trim($_POST['fname']),
                "lname" => trim($_POST['lname']),
                "email" => trim($_POST['email']),
                "phone" => trim($_POST['phone']),
                "address_1" => trim($_POST['address_1']),
                "address_2" => trim($_POST['address_2']),
                "zipcode" => trim($_POST['zipcode']),
                "country" => trim($_POST['country'])
            ];
            $this->userModel->updateUserData($_SESSION['username'], $data);
        }

        $data = $this->userModel->getUserData($_SESSION['username']);
        $view_data = $info + $data;
        $this->view("master1", $view_data);
    }

    public function ad_Delete(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $userId =  $_POST['userId'];

            $this->userModel->ad_deleteUser($userId);
            $this->view("master3", [
                "title"=>"Dashboard | Users",
                "page"=>"admin_users",
                "qr_res"=>json_decode($this->userModel->ad_getAllUsers(), true)
            ]);
        }
    }
}

?>