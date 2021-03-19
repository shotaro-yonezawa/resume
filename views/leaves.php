<?php
session_start();

require_once "../classes/post.php";
require_once "../classes/user.php";

$post_obj = new Post;
$user_obj = new User;

$post_list = $post_obj->getPosts();
$user_profile = $user_obj->getUser();

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
    <link rel="stylesheet" href="../views/assets/css/style.css">
    <title>Leaves</title>
</head>
<body>
    <main class="container-fluid">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-10 col-lg-6 mx-auto">
                <div class="leaves">
                    <!------------ PHP ------------>
                    <?php
                        while($post = $post_list->fetch_assoc()){
                            $user_id = $post['user_id'];
                            $post_id = $post['post_id'];
                    ?>
                    <div class="leaf">
                        <div class="leaf_top">
                            <img src="../img/<?= $user_obj->getUserPhoto($user_id) ?>" alt="Profile Picture">
                            <div class="leaf_contents">
                                <a href="userProfile.php?user_id=<?= $user_id ?>"><?= $post['username'] ?></a>
                                <p><?= $post['content'] ?></p>
                                <p><?= $post_obj->confirmReply($post_id) ?></p>
                                <?= $post_obj->deleteButton($user_id,$post_id) ?>
                            </div>
                            <button type="button" data-toggle="collapse" data-target="#leaf_button<?= $post_id ?>" aria-expanded="false" aria-controls="leaf_button<?= $post_id ?>">See detail
                            </button>
                        </div>
                        <div class="collapse multi-collapse" id="leaf_button<?= $post_id ?>">
                            <div class="leaf_bottom container">
                                    <form action="../actions/reply.php" method="post" class="col-12">
                                        <div class="row">
                                            <textarea name="content" class="col-lg-6" required></textarea>
                                            <button type="submit" class="btn btn-primary btn-block col-lg-6" name="btn_reply" value="<?= $post_id ?>">Reply</button>
                                        </div>
                                    </form>
                                    <?php
                                        $reply_list = $post_obj->getReplies($post_id);
                                        while($replies = $reply_list->fetch_assoc()){
                                            $reply_id = $replies['user_id'];
                                    ?>
                                    <div class="reply_leaf">
                                        <img src="../img/<?= $user_obj->getUserPhoto($reply_id) ?>" alt="Profile Picture">
                                        <div class="reply_leaf_contents">
                                            <p><?= $replies['username'] ?></p>
                                            <p><?= $replies['content'] ?></p>
                                        </div>                                     
                                    </div>
                                    <?php
                                        }
                                    ?>
                            </div>
                        </div>
                    </div>
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
                        <button type="submit" class="btn btn-primary btn-block" name="btn_add_post">Add a leaf</button>
                    </form>
                </div>
                <div class="">
                    <div class="user">
                        <div class="card">
                            <p>username</p>
                        </div>
                    </div>
                </div>
                <a href="editProfile.php">Edit profile</a>
                <br>
                <a href="../actions/logout.php">Log out</a>
            </div>
        </div>
    </main>
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>