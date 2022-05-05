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
}
?>