<?php
session_start();
require_once "../classes/user.php";
$account_id = $_SESSION['id'];
$new_bio = $_POST['bio'];

$post = new User;
$post->updateProfile($account_id,$new_bio);
