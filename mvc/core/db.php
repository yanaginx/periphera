<?php 

class DB {

    public $con;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "periphera_db";

    function __construct() {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password);
        mysqli_select_db($this->con, $this->dbname);
        // mysqli_query($this->con, "SET NAMES 'utf8'"); // this only use to display vietnamese
    }
}

?>