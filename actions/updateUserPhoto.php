<?php
session_start();

include_once "../classes/user.php";
$user = new User;
$account_id = $_SESSION['id'];
$image_name = $_FILES['image']['name']; //multi-dimensional array
// first [] = name, second [] = property
$user->updateUserPhoto($account_id,$image_name);