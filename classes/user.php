<?php

require_once "database.php";

class User extends Database{
    public function getUserPhoto($user_id){
        $sql = "SELECT user_photo FROM users WHERE id = $user_id";
        
        if($result = $this->conn->query($sql)){
            $row = $result->fetch_assoc();
            if($row['user_photo'] != NULL){
                return $row['user_photo'];
            }else{
                return "icon-user-default.png";
            }
        }else{
            die("Error fetching photo: " . $this->conn->error);
        }
    }

    public function updateUserPhoto($account_id,$image_name){
        $sql = "UPDATE users SET user_photo = '$image_name' WHERE id = $account_id";
        // 1. Upload the name of the image to the database.
        if ($this->conn->query($sql)){
        $destination = "../img/" . basename($image_name); //basename remove anything without last part of filename
        // 2. Move the image into img folder.
            if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)){
                header("location: ../views/editProfile.php");
                exit;
            } else {
                echo "<p class='text-danger'>Error moving the photo.</p>";
            }
        }else{
            die("Error uploading photo: " . $conn->error);
        }
    }

    public function updateProfile($account_id,$new_bio){
        $new_bio = $this->conn->real_escape_string($new_bio);
        $sql = "UPDATE users SET bio = '$new_bio' WHERE id = $account_id";
        if($this->conn->query($sql)){
            header("location: ../views/editProfile.php");
            exit;
        } else {
           die("Error updating profile: " . $this->conn->error);
        }
    }

    public function getUser(){
        $account_id = $_SESSION['id'];
        $sql = "SELECT * FROM users WHERE id = $account_id";
        if($result = $this->conn->query($sql)){
            $row = $result->fetch_assoc();
            return $row;
        } else {
           die("Error retrieving users: " . $this->conn->error);
        }
    }
    public function getUserProfile(){
        $user_id = $_GET['user_id'];
        $sql = "SELECT * FROM users WHERE id = $user_id";
        if($result = $this->conn->query($sql)){
            $row = $result->fetch_assoc();
            return $row;
        } else {
           die("Error retrieving a user profile: " . $this->conn->error);
        }
    }
    public function getOneUserProfile($user_id){
        $sql = "SELECT * FROM users WHERE id = $user_id";
        if($result = $this->conn->query($sql)){
            $row = $result->fetch_assoc();
            return $row;
        } else {
           die("Error retrieving a user profile: " . $this->conn->error);
        }
    }
    
    public function createUser($username,$password){
        $password = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(username,`password`) VALUES ('$username','$password')";
        if($this->conn->query($sql)){
            header("location: ../views/login.php");
            exit;
        }else{
            die("Error adding a user: ".$this->conn->error);
        }
    }

    public function confirmPassword(){
        if(isset($_POST["signup"])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            if($password == $confirm_password){
                // createUser($username,$password);
                $this->createUser($username,$password);
            }else{
                echo "<p>Password and Confirm Password do not match.</P>";
            }
        }
    }

    public function confirmUser(){
        if(isset($_POST["signup"])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if($password == $confirm_password){
                // createUser($username,$password);
                $this->login($username,$password);
            }else{
                return "Password and Confirm Password do not match.";
            }
        }
    }

    public function login(){
        if(isset($_POST["login"])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $error = "<p>The username or password you entered is incorrect.</p>";
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $user_details = $result->fetch_assoc();
                // echo $password,$user_details['password'];
                if(password_verify($password,$user_details['password'])){
                    session_start();
                    
                    $_SESSION['id'] = $user_details['id'];
                    $_SESSION['username'] = $user_details['username'];
                    
                    header("location: ../views/leaves.php");
                    exit;
                }else{
                    echo $error;
                }
            }else{
                echo $error;
            }
        }
    }
    
    public function editUserButton($user_id){
        $account_id = $_SESSION['id'];
        if($account_id == $user_id){
            echo "<a href='editProfile.php'>Edit</a>";
        }
    }

    public function deleteAccount($account_id){
        $sql1 = "DELETE FROM replies WHERE `user_id` = $account_id";
        if($this->conn->query($sql1)){
            $sql2 = "DELETE FROM posts WHERE `user_id` = $account_id";
            if($this->conn->query($sql2)){
                $sql3 = "DELETE FROM users WHERE `id` = $account_id";
                if($this->conn->query($sql3)){
                    header("location: ../views/index.php");
                    exit;
                }else{
                    die("Error deleting account from users table: ".$this->conn->error);
                }    
            }else{
                die("Error deleting posts from posts table: ".$this->conn->error);
            }
        }else{
            die("Error deleting posts from replies table: ".$this->conn->error);
        }
    }



}

