<?php
require_once "../classes/post.php";

$content = $_POST['content'];
$user_id = 1;

$post = new Post;
$post->addPost($content,$user_id);
