<?php
require_once('initPdo.php');
$id = filter_input(INPUT_GET, "id");
$sql = "DELETE FROM blogs WHERE id = :id";
$pdo = initPdo();
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id',$id);
$stmt->execute();
header('Location: mypage.php');
