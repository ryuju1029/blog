<?php
require_once('initPdo.php');
require_once('redirect.php');
session_start();

$contents = filter_input(INPUT_POST, "contents");
$title = filter_input(INPUT_POST, "title");
$userId = $_SESSION['id'];

$sql = "INSERT INTO blogs (title, contents, user_id) VALUES (:title, :contents, :user_id)";
$pdo = initPdo();
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title);
$stmt->bindValue(':contents', $contents);
$stmt->bindValue(':user_id', $userId);
$stmt->execute();
redirect('mypage.php');
