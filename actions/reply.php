<?php
session_start();
require_once "../classes/post.php";

$content = $_POST['content'];
$account_id = $_SESSION['id'];
$reply_address_id = $_POST['btn_reply'];

$post = new Post;
$post->replyPost($content,$account_id,$reply_address_id);
