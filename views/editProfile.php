<?php
session_start();

require_once "../classes/user.php";

$user = new User;
$user_photo = $user->getUserPhoto();
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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Edit Profile</title>
</head>
<body>
    <main>
        <div class="container pb-5">
            <div class="col-4 mb-3 mx-auto">
                <div class="card">
                    <?=
                         "<img src='../img/"."$user_photo'"."  alt='Profile Photo' class='card-top-img'>"
                    ?>
                    <div class="card-body">
                        <form action="../actions/updateUserPhoto.php" method="post" enctype="multipart/form-data">
                            <div class="custom-file mb-2 col">
                                <label for="image" class="custom-file-label">Choose Photo</label>
                                <input type="file" name="image" id="image" class="custom-file-input">
                            </div>
                            <button type="submit" class="btn btn-outline-secondary btn-sm btn-block" name="btn_update_photo">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <form action="../actions/updateProfile" method="POST">
                <textarea  name="bio" cols="30" rows="10" class="form-control mb-5" name="bio" style="height: 250px;" placeholder="Write your bio here"><?= $user_profile['bio'] ?></textarea>
                <div class="input-group mb-2">
                    <div class="input-group-prepend" style="width:60px;">
                        <span class="input-group-text w-100"><i class="fas fa-id-card mx-auto"></i></span>
                    </div>
                    <input class="form-control" type="text" name="username" value="<?= $user_profile['username'] ?>" required>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-prepend" style="width:60px;">
                        <span class="input-group-text w-100"><i class="fas fa-lock mx-auto"></i></span>
                    </div>
                    <input class="form-control" type="password" name="password" placeholder="Enter password to confirm" required>
                </div>
                <button type="submit" name="btn_submit" class="d-block ml-auto btn btn-outline-dark btn-sm">Save Changes</button>
            </form>
        </div>
    </main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>