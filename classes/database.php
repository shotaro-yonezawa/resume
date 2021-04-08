<?php

class Database {
    // private $server_name = "us-cdbr-east-03.cleardb.com";
    // private $username = "bc7f2983a1e429";
    // private $password = "084bfab7"; 
    // private $db_name = "heroku_9a2ca3cb78f84b6";
    
    // --------------- Local ---------------
    private $server_name = "localhost";
    private $username = "root";
    private $password = "root"; 
    // $password for MAMP user = "root"
    private $db_name = "bleaf";
    // -------------------------------------
    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->server_name,$this->username,$this->password,$this->db_name);

        if($this->conn->connect_error){
            die("Unable to connect to database ".$this->db_name.": ".$this->conn->connect_error);
        }
    }
}