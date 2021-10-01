<?php
require_once('redirect.php');
require_once(__DIR__ . '/Dao/CommentsDao.php');
session_start();

$comments = filter_input(INPUT_POST, "comment");
$commenter_name = filter_input(INPUT_POST, "commenter_name");
$blog_id = filter_input(INPUT_POST, "blog_id");
$user_id = $_SESSION['id'];

$commentsDao = new CommentDao();

$commentsDao->create($comments, $commenter_name, $blog_id, $user_id);
redirect('detail.php?id=' . $blog_id);
