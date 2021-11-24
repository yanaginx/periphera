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

    public function ad_getAllMessages() {
        $qr = "SELECT id, content, fname, lname, email FROM `message`;";
        $rows =  mysqli_query($this->con, $qr);
        $data_arr = array();
        while ( $row = mysqli_fetch_assoc($rows) ) {
            $data_arr[] = $row;
        }
        return json_encode($data_arr);        
    }

    public function ad_deleteMessage($msgId){
        $qr = "DELETE FROM `message` WHERE id = ?;";
        $stmt = $this->con->prepare($qr);
        $stmt->bind_param('i', $msgId);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }
}



?>