<?php

class Database {
    private $server_name = "localhost";
    private $username = "root";
    private $password = "root"; 
    //for MAMP user, "root"
    private $db_name = "bleaf";
    protected $conn;

    public function __construct(){
        $this->conn = new mysqli($this->server_name,$this->username,$this->password,$this->db_name);

        if($this->conn->connect_error){
            die("Unable to connect to database ".$this->db_name.": ".$this->conn->connect_error);
        }
    }
}