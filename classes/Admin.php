<?php
require_once 'Fcf.php';

class Admin extends Fcf{

    function __construct(){
        parent::__construct();
        if($_SESSION['role'] !== '3'){
            header("Location: /fcf/pages/login.php");
        }
    }
    
    function set_profile(){
        
    }
}
?>