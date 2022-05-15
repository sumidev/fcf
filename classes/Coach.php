<?php
require_once 'Fcf.php';

class Coach extends Fcf{

    function __construct(){
        parent::__construct();
        if($_SESSION['role'] !== '2'){
            header("Location: /fcf/pages/login.php");
        }
    }

    function set_profile(){
        
    }

    /* check add requests */
    function check_requests(){
        $sql = "select * from requests where coach_id = ".$_SESSION['id'];
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>