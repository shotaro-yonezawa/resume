<?php
session_start();
require_once "../classes/user.php";
$user = new User;
$user_id = $_GET['user_id'];
$account_id = $_SESSION['id'];
$user_photo = $user->getUserPhoto($user_id);
$user_profile = $user->getUserProfile();

// echo $_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>User Profile</title>
</head>
<body>
    <main>
        <div class="container pb-5 mt-3">
            <div class="col-8 col-lg-4 mb-3 mx-auto">
                <div class="card">
                    <?=
                         "<img src='../img/"."$user_photo'"."  alt='Profile Photo' class='card-top-img'>"
                    ?>
                </div>
            </div>
            <p><?= $user_profile['username'] ?></p>
            <a href="../actions/logout.php">Log out</a>
            <br>
            <a href="leaves.php">Leaves</a>
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>