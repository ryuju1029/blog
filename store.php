<?php
require_once('initPdo.php');
require_once('redirect.php');
session_start();
//投稿した値を受けとり変数に格納
$contents = filter_input(INPUT_POST, "contents");
$title = filter_input(INPUT_POST, "title");
$userId = $_SESSION['id'];

//INSERT文を変数に格納
$sql = "INSERT INTO blogs (title, contents, user_id) VALUES (:title, :contents, :user_id)";

$pdo = initPdo();
//値はからのままSQLの実行の準備
$stmt = $pdo->prepare($sql);

//値が入った変数をexecuteにセットしてSQL実行
$stmt->bindValue(':title', $title);
$stmt->bindValue(':contents', $contents);
$stmt->bindValue(':user_id', $userId);
$stmt->execute();

//処理が終わったらトップページに遷移
redirect('mypage.php');
