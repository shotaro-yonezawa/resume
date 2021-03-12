<?php
session_start();

require_once "../classes/post.php";
require_once "../classes/user.php";

$post = new Post;
$post_list = $post->getPosts();

$user = new User;
$user_photo = $user->getUserPhoto();
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
    <title>Leaves</title>
</head>
<body>
    <main class="container-fluid">
        <div class="row">
            <div class="col-0 col-lg-3">

            </div>
            <div class="col-10 col-lg-6 mx-auto">
                <div class="leaves">
                    <!------------ PHP ------------>
                    <?php
                        while($post = $post_list->fetch_assoc()){
                    ?>
                    <button>
                        <div class="leaf" style="">
                            <img src="../img/<?= $user_photo ?>" alt="Profile Picture" style="height:50px;">
                            <div class="leaf_right">
                                <p>username</p>
                                <p><?= $post['content'] ?></p>
                            </div>
                        </div>
                    </button>
                    <br>
                    <?php
                        }
                    ?>
                    <!------------ PHP ------------>

                </div>
            </div>
            <div class="col-10 col-lg-3 mx-auto">
                <div class="post_leaf">
                    <form action="../actions/addPost.php" method="post">
                        <textarea name="content" required></textarea>
                        <button type="submit" class="btn btn-primary btn-block" name="btn_add_post" value="">Add a leaf</button>
                    </form>
                </div>
                <div class="col-lg-1">
                    <div class="user">
                        <div class="card">
                            <p>username</p>
                        </div>
                    </div>
                </div>
                <a href="editProfile.php">Edit</a>
            </div>
        </div>
    </main>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>