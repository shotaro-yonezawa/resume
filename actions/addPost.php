<?php
session_start();
require_once "../classes/post.php";

$content = $_POST['content'];
$account_id = $_SESSION['id'];

$post = new Post;
$post->addPost($content,$account_id);
