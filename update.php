<?php
require_once('initPdo.php');
$contents = filter_input(INPUT_POST, "content");
$title = filter_input(INPUT_POST, "title");
$id = filter_input(INPUT_POST, "id");
$sql = "UPDATE blogs SET title = :title, contents = :contents WHERE id = :id";
$pdo = initPdo();
$stmt = $pdo->prepare($sql);
$params = array(':title' => $title,':contents' => $contents,':id' => $id,);
$stmt->execute($params);
header('Location: mypage.php');