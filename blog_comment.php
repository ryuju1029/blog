<?php
require_once('initPdo.php');
require_once('redirect.php');
session_start();

$comments = filter_input(INPUT_POST, "comment");
$commenter_name = filter_input(INPUT_POST, "commenter_name");
$blog_id = filter_input(INPUT_POST, "blog_id");
$user_id = $_SESSION['id'];

$sql = "INSERT INTO comments (commenter_name, comments, blog_id, user_id) VALUES (:commenter_name, :comments, :blog_id, :user_id)";
$pdo = initPdo();
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':commenter_name', $commenter_name);
$stmt->bindValue(':comments', $comments);
$stmt->bindValue(':blog_id', $blog_id);
$stmt->bindValue(':user_id', $user_id);
$stmt->execute();
redirect('detail.php?id=' . $blog_id);
