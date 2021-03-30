<?php
session_start();
if(!$_SESSION['id']){
    header("location: ../index.php");
    exit;
}

require_once "../classes/user.php";
$user = new User;
$user_id = $_GET['user_id'];
$user_photo = $user->getUserPhoto($user_id);
$user_profile = $user->getUserProfile();

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
    <link rel="stylesheet" href="assets/css/userProfile.css">
    <title>User Profile</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-1 col-lg-2">

                </div>
                <div class="col-8">
                    <div class="profileCard">
                        <div class="row">
                            <div class="col-8 col-lg-4">
                                <?=
                                    "<img src='../img/"."$user_photo'"."  alt='Profile Photo' class='card-top-img'>"
                                ?>
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="textContents">
                                    <div class="username">
                                        <p><?= $user_profile['username'] ?></p>
                                    </div>
                                    <div class="bio">
                                        <p><?= $user_profile['bio'] ?></p>
                                    </div>
                                </div>
                                <div class="editProfile">
                                    <?= $user->editUserButton($user_id) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-12"> -->
                        <div class="link">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <a href="leaves.php"><i class="fas fa-arrow-left"></i> Back to Leaves</a>
                                </div>
                                <div class="col-3">

                                </div>
                                <div class="col-12 col-lg-4">
                                    <a href="../actions/logout.php">Log out</a>
                                </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>