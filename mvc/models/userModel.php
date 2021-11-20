<?php 
class UserModel extends DB {

    // public function insertNewUser( $username,
    //                                $password,
    //                                $email,
    //                                $fname,
    //                                $lname ) {
    //     $query = "INSERT INTO users (username, password, email, fname, lname) VALUES (?, ?, ?, ?, ?);";
    //     $stmt = $this->con->prepare($query);
    //     $stmt->bind_param('sssss', $username, $password, $email, $fname, $lname);
        
    //     $result = false;
    //     if( $stmt->execute() ){
    //         $result = true;
    //     } else {
    //         echo mysqli_errno($this->con);
    //     }

    //     return json_encode( $result );
    // }


    public function register( $data ) {
        $query = "INSERT INTO user (username, password, email) VALUES (?, ?, ?);";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('sss', $data['username'], $data['password'], $data['email']);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function login( $username, $password ) {
        $query = "SELECT username, password, email, role 
                    FROM `user` JOIN `users_have_roles` ON `user`.id = `user_id`
                                JOIN `role` ON `role_id` = `role`.id
                    WHERE username = ?;";
        $stmt = $this->con->prepare($query);

        // bind value
        $stmt->bind_param('s', $username);
        // execute
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if ($stmt_result->num_rows > 0) {
            $row_data = $stmt_result->fetch_assoc();
            // verify the password
            $hashedPassword = $row_data['password'];

            if ( password_verify($password, $hashedPassword) ) {
                $data = [
                    'username'=>$row_data['username'],
                    'role'=>$row_data['role']
                ];
                return json_encode($data);
            } else {
                return false;
            }
        }
    }

    public function regCheckUsername ( $username ) {
        $usernameValidation = '/^[a-zA-Z0-9]+$/';
        if(!preg_match($usernameValidation, $username)) {
            // if not empty, with only number and english char
            return json_encode("un_invalid");
        } else {
            // check if exists
            $query = "SELECT username FROM user WHERE username = ?;";
            $stmt = $this->con->prepare($query);
            
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();
            $num_rows = $stmt->num_rows();
    
            if ( $num_rows > 0 )  {
                return json_encode("un_existed");
            }
        }
        return json_encode("un_valid");
    }

    public function regCheckEmail( $email ) {
        if ( empty($email) ) {
            return json_encode("email_empty");
        } elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            return json_encode("email_invalid");
        } else {
            // check if email exists
            $query = "SELECT * FROM user WHERE email = ?;";
            $stmt = $this->con->prepare($query);
            
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $stmt->store_result();
            $num_rows = $stmt->num_rows();
    
            if ( $num_rows > 0 )  {
                return json_encode("email_existed");
            }
        }
        return json_encode("email_valid");
    }

    public function regCheckPassword( $password ) {
        $passwordValidation = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{5,}$/';

        # at least 5 character, contain at least 1 number, 1 uppercase and 1 special character
        if(!preg_match($passwordValidation, $password)) {
            // if not empty, with only number and english char
            return json_encode("passwd_invalid");
        }
        return json_encode("passwd_valid");
    }

    public function regCheckConfirmPassword( $password, $confirmPassword ) {
        if ( empty($confirmPassword) ) {
            return json_encode("confirmPasswd_empty");
        } else {
            if ( $password != $confirmPassword ) {
                return json_encode("confirmPasswd_notmatch");
            }
        }
        return json_encode("confirmPasswd_valid");
    }

    public function getUserData($username){
        $array = array();
        $datas = mysqli_query($this->con, "SELECT * FROM user WHERE username = '$username' ");
        while($row = mysqli_fetch_assoc($datas)){
            $array['id'] = $row['id'];
            $array['username'] = $row['username'];
            $array['fname'] = $row['fname'];
            $array['lname'] = $row['lname'];
            $array['email'] = $row['email'];
            $array['phone'] = $row['phone'];
            $array['address_1'] = $row['address_1'];
            $array['address_2'] = $row['address_2'];
            $array['zipcode'] = $row['zipcode'];
            $array['country'] = $row['country'];
        }
        return $array;
    }

    public function updateUserData($username, $fname){
        $sql = "UPDATE user SET VALUE fname = '$fname' WHERE username = '$username' ";
        $datas = mysqli_query($this->con, $sql);
        if ($datas) {
            return true;
        } else {
            return false;
        }
    }
}

?>