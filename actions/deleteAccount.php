<?php
session_start();
require_once "../classes/user.php";

$account_id = $_SESSION['id'];

$user = new User;
$user->deleteAccount($account_id);
