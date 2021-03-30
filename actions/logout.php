<?php

session_start();
// $_SESSION['id'] = 3;

session_unset();
// $_SESSION['id'];
session_destroy();

header("location: login.php"); //go to index.php / Login
exit;
