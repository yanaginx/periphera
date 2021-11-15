<?php 
    session_start();

    function isLoggedIn() {
        if ( isset($_SESSION['username']) ) {
            return true;
        } else {
            return false;
        }
    }
?>