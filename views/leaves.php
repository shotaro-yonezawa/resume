<?php
session_start();
if(!$_SESSION['id']){
    header("location: ../index.php");
    exit;
}

require_once "../classes/post.php";
require_once "../classes/user.php";

$post_obj = new Post;
$user_obj = new User;
$post_list = $post_obj->getPosts();
$user_profile = $user_obj->getUser();

$user = new User;
$session_id = $_SESSION['id'];
$user_photo = $user->getUserPhoto($session_id);
$session_user_profile = $user->getOneUserProfile($session_id);
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
    <link rel="stylesheet" href="../views/assets/css/leaves.css">
    <title>Leaves</title>
</head>
<body>
    <main class="container-fluid">
        <div class="row">
            <div class="col-lg-1">
                
            </div>
            <div class="col-12 col-lg-6">
                <div class="leaves">
                    <!------------ PHP ------------>
                    <?php
                        while($post = $post_list->fetch_assoc()){
                            $user_id = $post['user_id'];
                            $post_id = $post['post_id'];
                    ?>
                    <div class="leaf">
                        <div class="container">
                            <div class="leaf_top">
                                <img src="../img/<?= $user_obj->getUserPhoto($user_id) ?>" alt="Profile Picture">
                                <div class="leaf_contents">
                                    <div class="username">
                                        <a href="profile.php"><?= $post['username'] ?></a>
                                    </div>
                                    <div class="post">
                                        <p><?= $post['content'] ?></p>
                                    </div>
                                    <p><?= $post_obj->confirmReply($post_id) ?></p>
                                </div>
                                <div class="delete_leaf">
                                    <?= $post_obj->deleteButton($user_id,$post_id) ?>
                                </div>
                                <div class="detail_button">
                                    <button type="button" data-toggle="collapse" data-target="#leaf_button<?= $post_id ?>" aria-expanded="false" aria-controls="leaf_button<?= $post_id ?>"><i class="fas fa-caret-down"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="collapse multi-collapse" id="leaf_button<?= $post_id ?>">
                                <div class="leaf_bottom">
                                    <div class="reply_form">
                                        <form action="../actions/reply.php" method="post" class="col-12">
                                            <div class="input-group">
                                                <textarea name="content" class="form-control" maxlength="200" required placeholder = "Write your reply to <?= $post['username'] ?> here"></textarea>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn" name="btn_reply" id="replyButton" value="<?= $post_id ?>">Reply<i class="fab fa-envira"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                        $reply_list = $post_obj->getReplies($post_id);
                                        while($replies = $reply_list->fetch_assoc()){
                                            $reply_id = $replies['user_id'];
                                    ?>
                                    <div class="reply_leaf">
                                        <img src="../img/<?= $user_obj->getUserPhoto($reply_id) ?>" alt="Profile Picture">
                                        <div class="reply_leaf_contents">
                                            <div class="replyUsername">
                                                <p><?= $replies['username'] ?></p>
                                            </div>
                                            <div class="replyContent">
                                                <p><?= $replies['content'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <!------------ PHP ------------>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="responsibleArea">
                    <div class="post_leaf">
                        <form action="../actions/addPost.php" method="post">
                            <textarea name="content" maxlength="200" placeholder="Write your new leaf here" required></textarea>
                            <div class="row">
                                <button class="col-12 col-lg-3 ml-auto" type="submit" name="btn_add_post">Add <i class="fab fa-envira"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="profileCard">
                        <div class="row">
                            <div class="col-1 col-lg-4">
                                <?=
                                    "<img src='../img/"."$user_photo'"."  alt='Profile Photo' class='card-top-img'>"
                                ?>
                            </div>
                            <div class="col-11 col-lg-8">
                                <div class="textContents">
                                    <div class="sessionUsername">
                                        <p><?= $session_user_profile['username'] ?></p>
                                    </div>
                                    <div class="bio">
                                        <p><?= $session_user_profile['bio'] ?></p>
                                    </div>
                                </div>
                                <div class="editProfile">
                                    <?= $user->editUserButton($session_id) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="link">
                        <div class="row">
                            <div class="col-12 col-lg-4 ml-auto">
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