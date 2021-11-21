<?php 
    session_start();

    function isLoggedIn() {
        if ( isset($_SESSION['username']) ) {
            return true;
        } else {
            return false;
        }
    }

    function isProductDetail(){
        if (isset($_SESSION['product_detail'])){
            return true;
        }
        else{
            return false;
        }
    }
?>