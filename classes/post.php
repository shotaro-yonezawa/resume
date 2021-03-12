<?php

require_once "database.php";

class Post extends Database{
    public function getPosts(){
        $sql = "SELECT post_id, content, `user_id`FROM posts ORDER BY post_id DESC";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving posts: ".$this->conn->error);
        }
    }
    public function addPost($content,$user_id){
        $sql = "INSERT INTO posts(content, `user_id`) VALUES ('$content','$user_id')";
        if($this->conn->query($sql)){
            header("location: ../views/leaves.php");
            exit;
        }else{
            die("Error adding a leaf: ".$this->conn->error);
        }
    }


}