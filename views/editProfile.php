<?php
session_start();
if(!$_SESSION['id']){
    header("location: index.php");
    exit;
}

require_once "../classes/user.php";
$user = new User;
$account_id = $_SESSION['id'];
$user_photo = $user->getUserPhoto($account_id);
$user_profile = $user->getUser();

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
    <link rel="stylesheet" href="assets/css/editProfile.css">
    <title>Edit Profile</title>
</head>
<body>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-1">

                </div>
                <div class="col-10">
                    <div class="profileCard">
                        <div class="row">
                            <div class="col-8 col-lg-4">
                                <div class="card">
                                    <?=
                                        "<img src='../img/"."$user_photo'"."  alt='Profile Photo' class='card-top-img'>"
                                    ?>
                                    <div class="card-body">
                                        <div class="pictureForm">
                                            <form action="../actions/updateUserPhoto.php" method="post" enctype="multipart/form-data">
                                                <div class="custom-file">
                                                    <label for="image" class="custom-file-label">Choose Photo</label>
                                                    <input type="file" name="image" id="image" class="custom-file-input" required>
                                                </div>
                                                <button type="submit" class="btn btn-outline-secondary btn-sm btn-block" name="btn_update_photo">Update</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-8">
                                <div class="textContents">
                                    <p><?= $user_profile['username'] ?></p>
                                    <form action="../actions/updateProfile.php" method="POST">
                                        <!-- <label for="username">username</label> -->
                                        <!-- <input class="form-control" type="text" name="username" id="username" maxlength="15" minlength="3" value="<?= $user_profile['username'] ?>" required> -->
                                        <label for="bio">bio</label>
                                        <textarea  name="bio" id="bio" class="form-control" name="bio" maxlength="255" placeholder="Write your bio here"><?= $user_profile['bio'] ?></textarea>
                                        <!-- <input class="form-control" type="password" name="password" maxlength="" minlength="6" id="password" placeholder="Enter password to save changes" required> -->
                                        <button type="submit" name="btn_submit">Save Changes</button>
                                    </form>
                                    <div class="deleteButtons">
                                        <div class="trashButton">
                                            <button type='button' data-toggle='collapse' data-target='#delete_user_confirm' aria-expanded='false' aria-controls='delete_user_confirm'><i class='fas fa-trash-alt'></i></button>
                                        </div>
                                        <div class='collapse' id='delete_user_confirm'>
                                            <div class="deleteConfirming">
                                                <p><i class="fas fa-exclamation-triangle"></i> Are you sure to delete your account?</p>
                                                <form action='../actions/deleteAccount.php' method='post'>
                                                    <button name='delete_user' type='submit' >Yes</button>
                                                    <button type='button' data-toggle='collapse' data-target='#delete_user_confirm' aria-expanded='false' aria-controls='delete_user_confirm'>No</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- <a href="../actions/logout.php">Log out</a>
                                    <br>
                                    <a href="leaves.php">Leaves</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="link">
                        <div class="row">
                            <div class="col-12 col-lg-4">
                                <a href="leaves.php"><i class="fas fa-arrow-left"></i> Back to Leaves</a>
                            </div>
                            <div class="col-4">

                            </div>
                            <div class="col-12 col-lg-4">
                                <a href="../actions/logout.php">Log out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>