<?php 
class ContactModel extends DB {

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

    public function contactCheckEmail( $email ) {
        if ( empty($email) ) {
            return json_encode("email_empty");
        } elseif ( !filter_var($email, FILTER_VALIDATE_EMAIL) ) {
            return json_encode("email_invalid");
        }
        return json_encode("email_valid");
    }

    public function sendMessage ( $data ) {
        $query = "INSERT INTO `message` (fname, lname, email, content) VALUES (?, ?, ?, ?);";
        $stmt = $this->con->prepare($query);
        $stmt->bind_param('ssss', $data['fname'], $data['lname'], $data['email'], $data['message']);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }
}



?>