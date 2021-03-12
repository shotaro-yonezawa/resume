<?php
require_once "../classes/user.php";

$first_name = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if($password == $confirm_password){
    // $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    
    // $origin = $_POST['btn_register'];
    //$origin = "dashboard" / $origin = "register"
    
    // $user = new User;
    // $user->createUser($username,$password);
}else{
    
    $user = new User;
    $user->confirmPassword();
    // echo "<p class='text-danger'>Password and Confirm Password do not match.</p>";
}

