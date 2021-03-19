<?php
session_start();
require_once "../classes/post.php";

$post_id = $_POST['delete_post'];

$post = new Post;
$post->deletePost($post_id);