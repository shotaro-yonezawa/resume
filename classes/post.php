<?php

require_once "database.php";

class Post extends Database{
    public function getPosts(){
        $sql = "SELECT post_id, content, `user_id`, username FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY post_id DESC";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{
            die("Error retrieving posts: ".$this->conn->error);
        }
    }
    public function getReplies($post_id){
        $sql = "SELECT * FROM replies INNER JOIN users ON replies.user_id = users.id WHERE reply_address_id = $post_id";
        if($result = $this->conn->query($sql)){
            return $result;
        }else{

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
    public function replyPost($content,$account_id,$reply_address_id){
        // Add reply to replies table
        $sql1 = "INSERT INTO replies(content,`user_id`,reply_address_id) VALUES ('$content','$account_id','$reply_address_id')";
        if($this->conn->query($sql1)){

            // Get a reply_id from replies table
            $sql2 = "SELECT * FROM replies WHERE content = '$content' AND `user_id` = $account_id AND reply_address_id = $reply_address_id ORDER BY reply_id DESC LIMIT 1";
            if($result = $this->conn->query($sql2)){

                // Add reply to posts table with reply_id
                $reply_detail = $result->fetch_assoc();
                $reply_id = $reply_detail['reply_id'];
                $sql3 = "INSERT INTO posts(content,`user_id`,reply_id) VALUES ('$content','$account_id','$reply_id')";
                if($this->conn->query($sql3)){
                    header("location: ../views/leaves.php");
                    exit;
                }else{
                    die("Error adding reply to posts table: ".$this->conn->error);
                }
            }else{
                die("Error getting a reply from replies table: ".$this->conn->error);
            }
        }else{
            die("Error adding reply to replies table: ".$this->conn->error);
        }
    }

    public function confirmReply($post_id){
        $sql = "SELECT COUNT(*) FROM replies WHERE reply_address_id = $post_id";
        if($result = $this->conn->query($sql)){
            $count_reply = $result->fetch_assoc();
            if($count_reply['COUNT(*)'] >= 1){
                return $count_reply['COUNT(*)']." reply";
            }
        }else{
            die("Error counting reply: ".$this->conn->error);
        }
    }

    public function deleteButton($user_id,$post_id){
        if($user_id == $_SESSION['id']){
            echo "
            <button type='button' data-toggle='collapse' data-target='#delete_post_confirm$post_id' aria-expanded='false' aria-controls='delete_post_confirm'>Delete</button>
            <form action='../actions/deletePost.php' method='post'>
            <button name='delete_post' value='$post_id' type='submit' class='collapse' id='delete_post_confirm$post_id'>Are you sure to Delete?</button>
            </form>
            ";
        }
    }

    
    public function deletePost($post_id){
        $sql1 = "SELECT reply_id FROM posts WHERE post_id = $post_id";
        if($result = $this->conn->query($sql1)){
            $row = $result->fetch_assoc();
            $reply_id = $row['reply_id'];
            if($reply_id != NULL){
                $sql2 = "DELETE FROM replies WHERE reply_id = $reply_id";
                if($this->conn->query($sql2)){
                    $sql3 = "DELETE FROM posts WHERE reply_id = $reply_id";
                    if($this->conn->query($sql3)){
                        header("location: ../views/leaves.php");
                        exit;
                    }else{
                        die("Error deleting post in posts table: ".$this->conn->error);
                    }    
                }else{
                    die("Error deleting post in replies table: ".$this->conn->error);
                }
            }else{
                $sql4 = "DELETE FROM posts WHERE post_id = $post_id";
                if($this->conn->query($sql4)){
                    header("location: ../views/leaves.php");
                    exit;
                }else{
                    die("Error deleting post in posts table: ".$this->conn->error);
                }
            }
        }else{
            die("Error getting reply_id: ".$this->conn->error);
        }
    }



}