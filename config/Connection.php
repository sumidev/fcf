<?php
require_once 'config.php';

class Connection {
    protected $conn;
    function __construct(){
        $this->conn = new mysqli($_ENV['db_host'],$_ENV['username'],$_ENV['password'],$_ENV['db_name']);
    }
}
?>